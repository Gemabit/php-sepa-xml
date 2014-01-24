<?php
/**
 * SEPA file parser.
 *
 * @copyright © Gemabit <www.gemabit.com> 2014
 * @license Apache License, Version 2.0
 *
 *  Copyright 2014 Gemabit
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
 */

namespace Gemabit\Sepa\TransactionInformation\PaymentTypeInformation;


abstract class BasePaymentTypeInformation
{
    /**
     * @var string Reason ISO Code i.e "SCOR"
     */
    protected $categoryPurposeCode;

    /**
     * @param string $categoryPurposeCode
     */
    public function setCategoryPurposeCode($categoryPurposeCode)
    {
        $this->categoryPurposeCode = $categoryPurposeCode;
    }

    /**
     * @return string
     */
    public function getCategoryPurposeCode()
    {
        return $this->categoryPurposeCode;
    }
}