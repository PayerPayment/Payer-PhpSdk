<?php namespace Payer\Test\Integration;
/**
 * Copyright 2016 Payer Financial Services AB
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * PHP version 5.3
 *
 * @package Payer_Sdk
 * @author Payer <teknik@payer.se>
 * @copyright 2016 Payer Financial Services AB
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache license v2.0
 */
use Payer\Sdk\Client;
use Payer\Sdk\Webservice\WebserviceInterface;

class PayerTestCase extends \PHPUnit\Framework\TestCase
{

    /**
     * Payer Webservice Credentials
     *
     * @var array
     *
     */
    protected $credentials;

    /**
     * Payer Webservice Gateway
     *
     * @var WebserviceInterface
     */
    protected $gateway;

    /**
     * Payer Dummy Resource Stub
     *
     * @var PayerResourceStub
     */
    protected $stub;

    /**
     * Initializes the Payer test environment
     */
    protected function setUp(): void
    {
        $this->credentials = array(

            'agent_id' => 'PR_EXAMPLES',

            'post' => array(
                'key_1' => 'hL6eCgMLxgnXoF76egnlLZiGwrl8CPVJqRNSXqulwH0Lc6GhcTsOIBk6Tv3mbOVrvzajPuuc3tN6pjcs4v7BXgxHCpTD5EVp5VyKgTM9dp4sz7KssGUgNhNgxwJPLkDX',
                'key_2' => 'hj7MaLU6l8cysuMCxP8T11U9aiwC61PdaLPanA7zx0XQtAiRffB77l57trypidsiP9j3yfsWfgCyGLfLRGINSDKcU9r3cKbRIlK8r3Tw9mUFY1gGwPjfiUh4SzWxBXEm'
            ),

            'soap' => array(
                'username' => 'A48831305',
                'password' => '5526h4q9hSZt'
            )
        );

        $this->gateway = Client::create($this->credentials);
        $this->stub = new PayerResourceStub($this->gateway);
    }
}