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

class CreditTransferTransactionInformation extends BaseTransactionInformation
{
    
    /**
     * @var string
     */
    protected $requestedExecutionDate;

    /**
     * @var string
     */
    protected $paymentTypeInformation;

    /**
     * @var string
     */
    protected $debtorCountry;

    /**
     * @var string
     */
    protected $debtorAddressLine;

    /**
     * @var string
     */
    protected $debtorBIC;

    /**
     * @var string
     */
    protected $remittanceInformationCode;

    /**
     * @var string
     */
    protected $remittanceInformationIssuer;

    /**
     * @var string
     */
    protected $remittanceInformationReference;

    /**
     * @return mixed
     */
    public function getPaymentTypeInformation()
    {
        return $this->paymentTypeInformation;
    }

    /**
     * @param BasePaymentTypeInformation $paymentTypeInformation
     */
    public function setPaymentTypeInformation(BasePaymentTypeInformation $paymentTypeInformation)
    {
        $this->paymentTypeInformation = $paymentTypeInformation;
    }

    /**
     * @param mixed $debtorAddressLine
     */
    public function setDebtorAddressLine($debtorAddressLine)
    {
        $this->debtorAddressLine = $debtorAddressLine;
    }

    /**
     * @return mixed
     */
    public function getDebtorAddressLine()
    {
        return $this->debtorAddressLine;
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
     * @param mixed $debtorCountry
     */
    public function setDebtorCountry($debtorCountry)
    {
        $this->debtorCountry = $debtorCountry;
    }

    /**
     * @return mixed
     */
    public function getDebtorCountry()
    {
        return $this->debtorCountry;
    }

    /**
     * @param mixed $requestedExecutionDate
     */
    public function setRequestedExecutionDate($requestedExecutionDate)
    {
        $this->requestedExecutionDate = $requestedExecutionDate;
    }

    /**
     * @return mixed
     */
    public function getRequestedExecutionDate()
    {
        return $this->requestedExecutionDate;
    }

    /**
     * @param string $remittanceInformationCode
     */
    public function setRemittanceInformationCode($remittanceInformationCode)
    {
        $this->remittanceInformationCode = $remittanceInformationCode;
    }
    
    /**
     * @return string
     */
    public function getRemittanceInformationCode()
    {
        return $this->remittanceInformationCode;
    }

    /**
     * @param string $remittanceInformationIssuer
     */
    public function setRemittanceInformationIssuer($remittanceInformationIssuer)
    {
        $this->remittanceInformationIssuer = $remittanceInformationIssuer;
    }
    
    /**
     * @return string
     */
    public function getRemittanceInformationIssuer()
    {
        return $this->remittanceInformationIssuer;
    }

    /**
     * @param string $remittanceInformationReference
     */
    public function setRemittanceInformationCode($remittanceInformationReference)
    {
        $this->remittanceInformationReference = $remittanceInformationReference;
    }
    
    /**
     * @return string
     */
    public function getRemittanceInformationReference()
    {
        return $this->remittanceInformationReference;
    }

} 