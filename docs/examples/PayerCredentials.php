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
 * Setup your Payer Configuration here to be able to access the webservices.
 *
 * For further questions about your configuration, please contact
 * the Payer Customer service at kundtjanst@payer.se
 *
 */
$credentials = array(

      'agent_id' => 'TESTINSTALLATION',

     // Required by Purchase, GetAddress, Challenge

      'post' => array(
         'key_1'             => 'j3qh0b3B22sIyWulCZKeFJvIMx9mylLId2Qd4JEUAWtYJOacDKg9kCGWZE0oQKWUCDXwcshCfArOerQI2XGcpdYfIXtoyg02JWnLfuekVvZ1NGyFt5HJ8vOGj9VIeUzO',
         'key_2'             => 'mzuP5yWQWzesjrRlfQToHSf1B2xjNseZRyFLWrsIRw12NIcTpW9XFdN76afIsjyaI4Muk543qTT5sWNHJLueP8aK8gjqqHrYB5jLYcEfWn0eaNMJo7O55PF3VOicmA2N'
      ),

    // Required by Invoice, Order

    // 'soap'  => array(
       // 'username' => '',
       // 'password' => ''
    // )

);
