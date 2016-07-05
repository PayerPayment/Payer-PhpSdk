<?php
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
/**
 * PAYER CONFIGURATION
 *
 * To be able to run the examples you have to setup your Payer Credentials
 * for the webservice you're gonna use.
 **
 * For further questions about your configuration, please contact
 * the Payer Customer service at kundtjanst@payer.se
 *
 */
$credentials = array(

    'agent_id' => 'PR_EXAMPLES',

    // Required by Purchase, GetAddress, Challenge
    'post' => array(
        'key_1'             => 'PLkDXhL6eCgMLxgnXoF76egnlLZiGwrl8CPVJqRNSXqulwH0Lc6GhcTsOIBk6Tv3mbOVrvzajPuuc3tN6pjcs4v7BXgxHCpTD5EVp5VyKgTM9dp4sz7KssGUgNhNgxwJ',
        'key_2'             => 'xBXEmhj7MaLU6l8cysuMCxP8T11U9aiwC61PdaLPanA7zx0XQtAiRffB77l57trypidsiP9j3yfsWfgCyGLfLRGINSDKcU9r3cKbRIlK8r3Tw9mUFY1gGwPjfiUh4SzW'
    ),

    // Required by Invoice, Order
    //'soap'  => array(
    //    'username' => '',
    //    'password' => ''
    //)

);