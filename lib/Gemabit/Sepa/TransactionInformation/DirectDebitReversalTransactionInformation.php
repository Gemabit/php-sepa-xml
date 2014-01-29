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

    protected $mandateIdentification;

    protected $dateOfSignature;

    public function __construct()
    {
        parent::__construct();

        $this->dateOfSignature = new \Datetime();
    }
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
    public function setOriginalInstructedAmount($originalInstructedAmount)
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
        return $this->reversalReasonInformationCode;
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
        return $this->requestedCollectionDate;
    }

    /**
     * @param string $creditorSchemeIdentification
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

    /**
     * @param string $mandateIdentification
     */
    public function setMandateIdentification($mandateIdentification)
    {
        $this->mandateIdentification = $mandateIdentification;
    }

    /**
     * @return string
     */
    public function getMandateIdentification()
    {
        return $mandateIdentification;
    }

    /**
     * @param \Datetime $dateOfSignature
     */
    public function setDateOfSignature(\Datetime $dateOfSignature)
    {
        $this->dateOfSignature = $dateOfSignature;
    }

    /**
     * @return string
     */
    public function getDateOfSignature()
    {
        return $dateOfSignature;
    }
}
