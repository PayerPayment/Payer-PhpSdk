<?php namespace Payer\Test\Integration;
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

use Payer\Sdk\Client;
use Payer\Sdk\Transport\Http\Response;
use Payer\Sdk\Resource\Challenge;

class GetAddressTest extends PayerTestCase {

    /**
     * Initializes the Payer Test Environment
     *
     */
    protected function setUp() : void
    {
        parent::setUp();
    }

    /**
     * Test fetch Challenge Hash
     *
     * @return void
     *
     */
    public function testChallengeResponse()
    {
        print "testChallengeResponse()\n";

        $challengeResponse = $this->stub->challenge->create();

        var_dump($challengeResponse);

        $this->assertTrue($challengeResponse['status'] == 0);
    }

    /**
     * Test fetch address details with the requested Challenge Hash
     *
     * @return void
     *
     */
    public function testGetAddress()
    {
        print "testGetAddress()\n";

        $challengeResponse = $this->stub->createDummyChallenge();

        $getAddressData = array(
            'identity_number' => '5567368724',
            'zip_code'        => '10261',
            'challenge_token' => $challengeResponse['challenge_token']
        );

        $getAddressResponse = $this->stub->getAddress->create($getAddressData);

        var_dump($getAddressResponse);

        $this->assertTrue($getAddressResponse['status'] == 0);
    }

}