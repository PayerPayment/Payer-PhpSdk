<?php namespace Payer\Test\Unit;
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

use Payer\Sdk\Exception\ValidationException;
use Payer\Sdk\Validation\Order as OrderValidator;

use Payer\Test\Unit\Util\Random;

class OrderTest extends \PHPUnit\Framework\TestCase {

  private $_validator;

  protected function setUp(): void
  {
      $this->_validator = new OrderValidator();
  }

  public function testValidateItems_ShouldSucceed()
  {
      try {
          $items = [
            [
              'article_number' => Random::Alphabets(32)
            ]
          ];

          $this->_validator->validateItems($items);
          $this->assertTrue(true);
      } catch (Exception $e) {
          $this->fail('Should pass validation');
      }
  }

  public function testValidateItems_ShouldThrowExceptionAndFail()
  {
      $this->setExpectedException(ValidationException::class);
      $items = [
        [
          'article_number' => Random::Alphabets(32 + 1)
        ]
      ];

      $this->_validator->validateItems($items);
  }

}