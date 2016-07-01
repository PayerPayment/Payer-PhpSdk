<?php namespace Payer\Sdk\Resource;
/**
 * Copyright 2016 Payer Financial Services AB
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * PHP version 5.3
 *
 * @package   Payer_Sdk
 * @author    Payer <teknik@payer.se>
 * @copyright 2016 Payer Financial Services AB
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache license v2.0
 */

use Payer\Sdk\Exception\InvalidRequestException;
use Payer\Sdk\Format\GetAddress as GetAddressFormatter;
use Payer\Sdk\PayerGatewayInterface;
use Payer\Sdk\Transport\Http\Response;
use Payer\Sdk\Transport\Http\Request;
use Payer\Sdk\Transport\Http;

class GetAddress extends PayerResource
{
    /**
     * Get address object formatter
     *
     * @var DataFormatter
     *
     */
    private $_formatter;

    /**
     * Resource Location
     *
     * @var string
     *
     */
    protected $relativePath = '/pages/helper/getAddressEx.jsp';

    public function __construct(PayerGatewayInterface $gateway)
    {
        $this->gateway = $gateway;

        $this->_formatter = new GetAddressFormatter();
    }

    /**
     * Fetches the defined customers address details.
     *
     * NOTICE: This method depends on valid Post credentials
     *
     * @param array $input The GetAddress object
     * @return string An array of address details as json
     * @throws InvalidRequestException
     *
     */
    public function create(array $input)
    {
        $input = $this->_formatter->filterGetAddress($input);

        $identityNumber = $input['identity_number'];
        if (empty($identityNumber)) {
            throw new InvalidRequestException("Missing argument: 'identity_number'");
        }

        $hash = $input['hash'];
        if (empty($hash)) {
            throw new InvalidRequestException("Missing argument: 'hash'");
        }

        $post = $this->gateway->getPostService();
        $credentials = $post->getCredentials();

        $http = new Http;

        $request = new Request(
            $this->gateway->getDomain() . $this->relativePath . '?website=' . $credentials['agent_id'] . '&orgnr=' . $identityNumber . "&hash=" . $hash
        );

        $response = $http->request($request);

        $obj = Response::fromJson(
            iconv(
                'ISO-8859-1',
                'UTF-8',
                $response->getData()
            )
        );

        $customer = $obj['consumer'];

        $getAddress = array();
        $getAddress['status']          = $customer['status'];
        $getAddress['identity_number'] = $customer['personalnumber'];

        if (!empty($customer['company'])) {
            $getAddress['organisation'] = array(
                'name' => $customer['company']
            );
        } else {
            $getAddress['first_name']  = $customer['firstname'];
            $getAddress['last_name']   = $customer['lastname'];
        }

        $getAddress['address']     = $customer['address'];
        $getAddress['zip_code']    = $customer['zipcode'];
        $getAddress['city']        = $customer['city'];
        $getAddress['country']     = $customer['country'];

        return Response::fromArray($getAddress);
    }

}