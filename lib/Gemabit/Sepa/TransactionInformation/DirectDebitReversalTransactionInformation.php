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

namespace Gemabit\Sepa\TransactionInformation;


use Gemabit\Sepa\TransactionInformation\PaymentTypeInformation\BasePaymentTypeInformation;

class DirectDebitReversalTransactionInformation extends BaseTransactionInformation
{

    protected $originalInstructedAmount;

    protected $reversalReasonInformationCode;

    protected $requestedCollectionDate;

    protected $creditorSchemeIdentification;

    /**
     * @return mixed
     */
    public function getPaymentTypeInformation()
    {
        // TODO: Implement getPaymentTypeInformation() method.
    }

    /**
     * @param BasePaymentTypeInformation $paymentTypeInformation
     */
    public function setPaymentTypeInformation(BasePaymentTypeInformation $paymentTypeInformation)
    {
        // TODO: Implement setPaymentTypeInformation() method.
    }

    /**
     * @param string $originalInstructedAmount
     */
    public function setPaymentTypeInformation($originalInstructedAmount)
    {
        $this->originalInstructedAmount = $originalInstructedAmount;
    }

    /**
     * @return string
     */
    public function getOriginalInstructedAmount()
    {
        return $originalInstructedAmount;
    }

    /**
     * @param string $reversalReasonInformationCode
     */
    public function setReversalReasonInformationCode($reversalReasonInformationCode)
    {
        $this->reversalReasonInformationCode = $reversalReasonInformationCode;
    }

    /**
     * @return string
     */
    public function getReversalReasonInformationCode()
    {
        return $reversalReasonInformationCode;
    }

    /**
     * @param \Datetime $requestedCollectionDate
     */
    public function setRequestedCollectionDate(\Datetime $requestedCollectionDate)
    {
        $this->requestedCollectionDate = $requestedCollectionDate;
    }

    /**
     * @return \Datetime
     */
    public function getRequestedCollectionDate()
    {
        return $requestedCollectionDate;
    }

    /**
     * @param strig $creditorSchemeIdentification
     */
    public function setCreditorSchemeIdentification($creditorSchemeIdentification)
    {
        $this->creditorSchemeIdentification = $creditorSchemeIdentification;
    }

    /**
     * @return string
     */
    public function getCreditorSchemeIdentification()
    {
        return $creditorSchemeIdentification;
    }
}
