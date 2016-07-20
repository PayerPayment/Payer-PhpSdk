<?php namespace Payer\Sdk;
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

class Client {

	/**
	 * Payer Resource Domain
	 *
	 */
	const PAYER_DOMAIN = 'https://secure.payer.se/PostAPI_V1';

	/**
	 * This is the main method that initiates the Payer Gateway
	 * and all available Payment Services.
	 *
	 * To be able to create an instance of the Payer Gateway you need
	 * to pass the credential array with follwing format:
	 *
	 * $credentials = array(
	 * 		'agent_id' => 'TESTINSTALLATION',
	 * 		'post' => array(
	 *			'key_1'             => 'j3qh0b3B22sIyWulCZKeFJvIMx9mylLId2Qd4JEUAWtYJOacDKg9kCGWZE0oQKWUCDXwcshCfArOerQI2XGcpdYfIXtoyg02JWnLfuekVvZ1NGyFt5HJ8vOGj9VIeUzO',
	 *			'key_2'             => 'mzuP5yWQWzesjrRlfQToHSf1B2xjNseZRyFLWrsIRw12NIcTpW9XFdN76afIsjyaI4Muk543qTT5sWNHJLueP8aK8gjqqHrYB5jLYcEfWn0eaNMJo7O55PF3VOicmA2N',
	 *			'redirect_path'     => 'http://secure.payer.se/w3/payread.cgi',
	 *			'version'           => 30
	 * 		),
	 * 		'rest' => array(
	 * 			'username' => 'TESTINSTALLATION',
	 *			'password' => 'payertest123'
	 * 		),
	 * 		'soap' => array(
	 * 			'username' => 'TESTINSTALLATION',
	 *			'password' => 'ZRyFLWrsIRw12NIcTpW9XFdN76afIsjyaI4Muk543qTT5s'
	 * 		)
	 * )
	 *
	 * NOTICE: At least one of the webservice credentials has to be
	 * added in the array to be able to initiate the Payment Gateway.
	 *
	 * You can find your personal credentials at your Payer
	 * Administration page.
	 *
	 * @param array $credentials Mandatory
	 * @param array $options Non-mandatory
	 * @return PayerGatewayInterface
	 *
	 */
	public static function create(
		$credentials,
		$options = array()
	) {
		if (empty($options['domain'])) {
			$options['domain'] = self::PAYER_DOMAIN;
		}

		return new Gateway($credentials, $options);
	}

}
