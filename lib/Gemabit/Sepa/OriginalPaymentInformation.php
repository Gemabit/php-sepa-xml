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

namespace Gemabit\Sepa;

use Gemabit\Sepa\TransactionInformation\TransactionInformationInterface;

class OriginalPaymentInformation
{

    /**
     * @var string
     */
    protected $OriginalPaymentInformationIdentification;

    /**
     * @var int Number of transactions of the original document
     */
    protected $originalNumberOfTransactions;

    /**
     * @var string checksum for the original transaction
     */
    protected $originalControlsum;

    /**
     * @var string Original message status
     */
    protected $statusReasonInformationProprietary;

    /**
     * @var array List of transactions
     */
    protected $transactions;

    /**
     * @var string message addition information ([a-zA-Z0-9]){1,105}
     * @note portuguese system supports only one occurrence
     */
    protected $additionalInformation;

    /**
     * @var string transaction amount for the respective message ([a-zA-Z0-9]){1,15}
     */
    protected $detailedNumberOfTransactionsPerStatus;

    /**
     * @var string common status to all the reported messages ([a-zA-Z0-9]){4}
     */
    protected $detailedStatus;

    /**
     * @var string total amount for the reported transactions ([0-9]){1,15}(\,|\.)?([0-9]){0,2}
     */
    protected $detailedControlSum;

    public function __construct()
    {

    }

    /**
     * @param TransactionInformationInterface $transaction
     */
    public function addTransaction(TransactionInformationInterface $transaction)
    {
        $this->transactions[] = $transaction;
    }

    /**
     * @return array Transaction Informations for this payment
     */
    public function getTransactions()
    {
        return $this->transactions;
    }

    /**
     * @param string $originalPaymentInformationIdentification
     */
    public function setOriginalPaymentInformationIdentification($originalPaymentInformationIdentification)
    {
        $this->originalPaymentInformationIdentification = $originalPaymentInformationIdentification;
    }

    /**
     * @return string
     */
    public function getOriginalPaymentInformationIdentification()
    {
        return $this->OriginalPaymentInformationIdentification;
    }

    /**
     * @param int $originalNumberOfTransactions
     */
    public function setOriginalNumberOfTransactions($originalNumberOfTransactions)
    {
        $this->originalNumberOfTransactions = $originalNumberOfTransactions;
    }

    /**
     * @return int
     */
    public function getOriginalNumberOfTransactions()
    {
        return $this->originalNumberOfTransactions;
    }

    /**
     * @param string $originalControlsum
     */
    public function setOriginalControlsum($originalControlsum)
    {
        $this->originalControlsum = $originalControlsum;
    }

    /**
     * @return string
     */
    public function getOriginalControlsum()
    {
        return $this->originalControlsum;
    }

    /**
     * @param string $statusReasonInformationProprietary
     */
    public function setStatusReasonInformationProprietary($statusReasonInformationProprietary)
    {
        $this->statusReasonInformationProprietary = $statusReasonInformationProprietary;
    }

    /**
     * @return string
     */
    public function getStatusReasonInformationProprietary()
    {
        return $this->statusReasonInformationProprietary;
    }


} 