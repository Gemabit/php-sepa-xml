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


class DirectDebitPaymentTypeInformation extends BasePaymentTypeInformation
{

    /**
     * @var string code for the general purpose i.e. "SCOR"
     */
    protected $localInstrumentCode;

    /**
     * @var string code for the seuqnce type i.e. "OOFF"
     */
    protected $sequenceType;

    /**
     * @param mixed $localInstrumentCode
     */
    public function setLocalInstrumentCode($localInstrumentCode)
    {
        $this->localInstrumentCode = $localInstrumentCode;
    }

    /**
     * @return mixed
     */
    public function getLocalInstrumentCode()
    {
        return $this->localInstrumentCode;
    }

    /**
     * @param mixed $sequenceType
     */
    public function setSequenceType($sequenceType)
    {
        $this->sequenceType = $sequenceType;
    }

    /**
     * @return mixed
     */
    public function getSequenceType()
    {
        return $this->sequenceType;
    }


} 