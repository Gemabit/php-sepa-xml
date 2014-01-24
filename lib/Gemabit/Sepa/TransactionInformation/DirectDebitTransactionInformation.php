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


class DirectDebitTransactionInformation extends BaseTransactionInformation
{

    /**
     * @var
     */
    protected $statusIdentification;

    /**
     * @var
     */
    protected $chargesInformationAmount;

    /**
     * @var
     */
    protected $chargesInformationParty;

    /**
     * @var
     */
    protected $financialInstitutionBIC;

    /**
     * @var
     */
    protected $requestedCollectionDate;

    /**
     * @var
     */
    protected $creditorSchemeIdentification;

    /**
     * @var
     */
    protected $paymentTypeInformation;

    /**
     * @var
     */
    protected $mandateIdentification;

    /**
     * @var
     */
    protected $mandateDateOfSignature;

    /**
     * @var
     */
    protected $originalMandateIdentification;

    /**
     * @var
     */
    protected $originalCreditorSchemeName;

    /**
     * @var
     */
    protected $originalCreditorSchemeIdentification;

    /**
     * @var
     */
    protected $originalDebtorIBAN;

    /**
     * @var
     */
    protected $originalDebtorAgentIdentification;


    public function getPaymentTypeInformation()
    {
        return $this->paymentTypeInformation;
    }

    public function setPaymentTypeInformation(BasePaymentTypeInformation $paymentTypeInformation)
    {
        $this->paymentTypeInformation = $paymentTypeInformation;
    }

    /**
     * @param mixed $chargesInformationAmount
     */
    public function setChargesInformationAmount($chargesInformationAmount)
    {
        $this->chargesInformationAmount = $chargesInformationAmount;
    }

    /**
     * @return mixed
     */
    public function getChargesInformationAmount()
    {
        return $this->chargesInformationAmount;
    }

    /**
     * @param mixed $chargesInformationParty
     */
    public function setChargesInformationParty($chargesInformationParty)
    {
        $this->chargesInformationParty = $chargesInformationParty;
    }

    /**
     * @return mixed
     */
    public function getChargesInformationParty()
    {
        return $this->chargesInformationParty;
    }

    /**
     * @param mixed $creditorSchemeIdentification
     */
    public function setCreditorSchemeIdentification($creditorSchemeIdentification)
    {
        $this->creditorSchemeIdentification = $creditorSchemeIdentification;
    }

    /**
     * @return mixed
     */
    public function getCreditorSchemeIdentification()
    {
        return $this->creditorSchemeIdentification;
    }

    /**
     * @param mixed $financialInstitutionBIC
     */
    public function setFinancialInstitutionBIC($financialInstitutionBIC)
    {
        $this->financialInstitutionBIC = $financialInstitutionBIC;
    }

    /**
     * @return mixed
     */
    public function getFinancialInstitutionBIC()
    {
        return $this->financialInstitutionBIC;
    }

    /**
     * @param mixed $mandateDateOfSignature
     */
    public function setMandateDateOfSignature($mandateDateOfSignature)
    {
        $this->mandateDateOfSignature = $mandateDateOfSignature;
    }

    /**
     * @return mixed
     */
    public function getMandateDateOfSignature()
    {
        return $this->mandateDateOfSignature;
    }

    /**
     * @param mixed $mandateIdentification
     */
    public function setMandateIdentification($mandateIdentification)
    {
        $this->mandateIdentification = $mandateIdentification;
    }

    /**
     * @return mixed
     */
    public function getMandateIdentification()
    {
        return $this->mandateIdentification;
    }

    /**
     * @param mixed $originalCreditorSchemeIdentification
     */
    public function setOriginalCreditorSchemeIdentification($originalCreditorSchemeIdentification)
    {
        $this->originalCreditorSchemeIdentification = $originalCreditorSchemeIdentification;
    }

    /**
     * @return mixed
     */
    public function getOriginalCreditorSchemeIdentification()
    {
        return $this->originalCreditorSchemeIdentification;
    }

    /**
     * @param mixed $originalCreditorSchemeName
     */
    public function setOriginalCreditorSchemeName($originalCreditorSchemeName)
    {
        $this->originalCreditorSchemeName = $originalCreditorSchemeName;
    }

    /**
     * @return mixed
     */
    public function getOriginalCreditorSchemeName()
    {
        return $this->originalCreditorSchemeName;
    }

    /**
     * @param mixed $originalDebtorAgentIdentification
     */
    public function setOriginalDebtorAgentIdentification($originalDebtorAgentIdentification)
    {
        $this->originalDebtorAgentIdentification = $originalDebtorAgentIdentification;
    }

    /**
     * @return mixed
     */
    public function getOriginalDebtorAgentIdentification()
    {
        return $this->originalDebtorAgentIdentification;
    }

    /**
     * @param mixed $originalDebtorIBAN
     */
    public function setOriginalDebtorIBAN($originalDebtorIBAN)
    {
        $this->originalDebtorIBAN = $originalDebtorIBAN;
    }

    /**
     * @return mixed
     */
    public function getOriginalDebtorIBAN()
    {
        return $this->originalDebtorIBAN;
    }

    /**
     * @param mixed $originalMandateIdentification
     */
    public function setOriginalMandateIdentification($originalMandateIdentification)
    {
        $this->originalMandateIdentification = $originalMandateIdentification;
    }

    /**
     * @return mixed
     */
    public function getOriginalMandateIdentification()
    {
        return $this->originalMandateIdentification;
    }

    /**
     * @param mixed $requestedCollectionDate
     */
    public function setRequestedCollectionDate($requestedCollectionDate)
    {
        $this->requestedCollectionDate = $requestedCollectionDate;
    }

    /**
     * @return mixed
     */
    public function getRequestedCollectionDate()
    {
        return $this->requestedCollectionDate;
    }

    /**
     * @param mixed $statusIdentification
     */
    public function setStatusIdentification($statusIdentification)
    {
        $this->statusIdentification = $statusIdentification;
    }

    /**
     * @return mixed
     */
    public function getStatusIdentification()
    {
        return $this->statusIdentification;
    }


} 