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


abstract class BaseTransactionInformation implements TransactionInformationInterface
{

    /**
     * @var
     */
    protected $originalEndToEndIdentification;

    /**
     * @var
     */
    protected $statusReasonInformationCode;

    /**
     * @var
     */
    protected $statusReasonInformationProprietary;

    /**
     * @var
     */
    protected $originalTransactionReferenceInstructedAmount;

    /**
     * @var
     */
    protected $paymentMethod;

    /**
     * @var
     */
    protected $remittanceInformationUnstructured;

    /**
     * @var
     */
    protected $structuredRemmitanceInformationCode;

    /**
     * @var
     */
    protected $structuredRemmitanceInformationIssuer;

    /**
     * @var
     */
    protected $structuredRemmitanceInformationReference;

    /**
     * @var
     */
    protected $ultimateDebtorName;

    /**
     * @var
     */
    protected $debtorBIC;

    /**
     * @var
     */
    protected $debtorName;

    /**
     * @var
     */
    protected $debtorIBAN;

    /**
     * @var
     */
    protected $creditorBIC;

    /**
     * @var
     */
    protected $creditorName;

    /**
     * @var
     */
    protected $creditorCountry;

    /**
     * @var
     */
    protected $creditorAddressLine;

    /**
     * @var
     */
    protected $creditorIBAN;

    /**
     * @var
     */
    protected $ultimateCreditorName;

    public function __constuct()
    {
        //Do something
    }

    /**
     * @param mixed $creditorAddressLine
     */
    public function setCreditorAddressLine($creditorAddressLine)
    {
        $this->creditorAddressLine = $creditorAddressLine;
    }

    /**
     * @return mixed
     */
    public function getCreditorAddressLine()
    {
        return $this->creditorAddressLine;
    }

    /**
     * @param mixed $creditorBIC
     */
    public function setCreditorBIC($creditorBIC)
    {
        $this->creditorBIC = $creditorBIC;
    }

    /**
     * @return mixed
     */
    public function getCreditorBIC()
    {
        return $this->creditorBIC;
    }

    /**
     * @param mixed $creditorCountry
     */
    public function setCreditorCountry($creditorCountry)
    {
        $this->creditorCountry = $creditorCountry;
    }

    /**
     * @return mixed
     */
    public function getCreditorCountry()
    {
        return $this->creditorCountry;
    }

    /**
     * @param mixed $creditorIBAN
     */
    public function setCreditorIBAN($creditorIBAN)
    {
        $this->creditorIBAN = $creditorIBAN;
    }

    /**
     * @return mixed
     */
    public function getCreditorIBAN()
    {
        return $this->creditorIBAN;
    }

    /**
     * @param mixed $creditorName
     */
    public function setCreditorName($creditorName)
    {
        $this->creditorName = $creditorName;
    }

    /**
     * @return mixed
     */
    public function getCreditorName()
    {
        return $this->creditorName;
    }

    /**
     * @param mixed $debtorBIC
     */
    public function setDebtorBIC($debtorBIC)
    {
        $this->debtorBIC = $debtorBIC;
    }

    /**
     * @return mixed
     */
    public function getDebtorBIC()
    {
        return $this->debtorBIC;
    }

    /**
     * @param mixed $debtorIBAN
     */
    public function setDebtorIBAN($debtorIBAN)
    {
        $this->debtorIBAN = $debtorIBAN;
    }

    /**
     * @return mixed
     */
    public function getDebtorIBAN()
    {
        return $this->debtorIBAN;
    }

    /**
     * @param mixed $debtorName
     */
    public function setDebtorName($debtorName)
    {
        $this->debtorName = $debtorName;
    }

    /**
     * @return mixed
     */
    public function getDebtorName()
    {
        return $this->debtorName;
    }

    /**
     * @param mixed $originalEndToEndIdentification
     */
    public function setOriginalEndToEndIdentification($originalEndToEndIdentification)
    {
        $this->originalEndToEndIdentification = $originalEndToEndIdentification;
    }

    /**
     * @return mixed
     */
    public function getOriginalEndToEndIdentification()
    {
        return $this->originalEndToEndIdentification;
    }

    /**
     * @param mixed $originalTransactionReferenceInstructedAmount
     */
    public function setOriginalTransactionReferenceInstructedAmount($originalTransactionReferenceInstructedAmount)
    {
        $this->originalTransactionReferenceInstructedAmount = $originalTransactionReferenceInstructedAmount;
    }

    /**
     * @return mixed
     */
    public function getOriginalTransactionReferenceInstructedAmount()
    {
        return $this->originalTransactionReferenceInstructedAmount;
    }

    /**
     * @param mixed $paymentMethod
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    /**
     * @return mixed
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * @param mixed $statusReasonInformationCode
     */
    public function setStatusReasonInformationCode($statusReasonInformationCode)
    {
        $this->statusReasonInformationCode = $statusReasonInformationCode;
    }

    /**
     * @return mixed
     */
    public function getStatusReasonInformationCode()
    {
        return $this->statusReasonInformationCode;
    }

    /**
     * @param mixed $statusReasonInformationProprietary
     */
    public function setStatusReasonInformationProprietary($statusReasonInformationProprietary)
    {
        $this->statusReasonInformationProprietary = $statusReasonInformationProprietary;
    }

    /**
     * @return mixed
     */
    public function getStatusReasonInformationProprietary()
    {
        return $this->statusReasonInformationProprietary;
    }

    /**
     * @param mixed $structuredRemmitanceInformationCode
     */
    public function setStructuredRemmitanceInformationCode($structuredRemmitanceInformationCode)
    {
        $this->structuredRemmitanceInformationCode = $structuredRemmitanceInformationCode;
    }

    /**
     * @return mixed
     */
    public function getStructuredRemmitanceInformationCode()
    {
        return $this->structuredRemmitanceInformationCode;
    }

    /**
     * @param mixed $structuredRemmitanceInformationIssuer
     */
    public function setStructuredRemmitanceInformationIssuer($structuredRemmitanceInformationIssuer)
    {
        $this->structuredRemmitanceInformationIssuer = $structuredRemmitanceInformationIssuer;
    }

    /**
     * @return mixed
     */
    public function getStructuredRemmitanceInformationIssuer()
    {
        return $this->structuredRemmitanceInformationIssuer;
    }

    /**
     * @param mixed $structuredRemmitanceInformationReference
     */
    public function setStructuredRemmitanceInformationReference($structuredRemmitanceInformationReference)
    {
        $this->structuredRemmitanceInformationReference = $structuredRemmitanceInformationReference;
    }

    /**
     * @return mixed
     */
    public function getStructuredRemmitanceInformationReference()
    {
        return $this->structuredRemmitanceInformationReference;
    }

    /**
     * @param mixed $ultimateCreditorName
     */
    public function setUltimateCreditorName($ultimateCreditorName)
    {
        $this->ultimateCreditorName = $ultimateCreditorName;
    }

    /**
     * @return mixed
     */
    public function getUltimateCreditorName()
    {
        return $this->ultimateCreditorName;
    }

    /**
     * @param mixed $ultimateDebtorName
     */
    public function setUltimateDebtorName($ultimateDebtorName)
    {
        $this->ultimateDebtorName = $ultimateDebtorName;
    }

    /**
     * @return mixed
     */
    public function getUltimateDebtorName()
    {
        return $this->ultimateDebtorName;
    }

    /**
     * @param mixed $remittanceInformationUnstructured
     */
    public function setRemittanceInformationUnstructured($remittanceInformationUnstructured)
    {
        $this->remittanceInformationUnstructured = $remittanceInformationUnstructured;
    }

    /**
     * @return mixed
     */
    public function getRemittanceInformationUnstructured()
    {
        return $this->remittanceInformationUnstructured;
    }


} 