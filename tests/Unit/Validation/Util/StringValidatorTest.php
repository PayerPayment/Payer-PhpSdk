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

use Payer\Sdk\Validation\Util\StringValidator;

use Payer\Test\Unit\Util\Random;

class StringValidatorTest extends \PHPUnit\Framework\TestCase {

    public function testValidateMaxLength_ShouldReturnTrue()
    {
        $max = 128;
        $str = Random::Alphabets($max);
        $this->assertTrue(StringValidator::validateMaxLength($str, $max));
    }

    public function testValidateMaxLength_ShouldReturnFalse()
    {
        $max = 128;
        $str = Random::Alphabets($max + 1);
        $this->assertFalse(StringValidator::validateMaxLength($str, $max));
    }

}