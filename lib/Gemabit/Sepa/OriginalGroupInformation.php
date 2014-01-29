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

use Gemabit\Sepa\DomBuilder\DomBuilderInterface;

class OriginalGroupInformation
{

    /**
     * @var string original message information identification ([a-zA-Z0-9]){1,35}
     */
    protected $originalMessageIdentification;

    /**
     * @var string original message information name ([a-zA-Z0-9]){1,35}
     */
    protected $originalMessageNameIdentification;

    /**
     * @var string original number of transactions ([a-zA-Z0-9]){1,15}
     */
    protected $originalNumberOfTransactions;

    /**
     * @var double original control sum ([0-9]){1,15}(\,|\.)?([0-9]){0,2}
     */
    protected $originalControlSum;

    /**
     * @var string status reason information proprietary code,
     *      indicating original message status ([a-zA-Z0-9]){1,35}
     */
    protected $statusReasonInformationProprietary;

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

    public function __construct($originalMessageIdentification = '', $originalMessageNameIdentification = 'pain.008.001.02')
    {
        $this->originalMessageIdentification = $originalMessageIdentification;
        $this->originalMessageNameIdentification = $originalMessageNameIdentification;
    }

    /**
     * @param mixed $detailedControlSum
     */
    public function setDetailedControlSum($detailedControlSum)
    {
        $this->detailedControlSum = $detailedControlSum;
    }

    /**
     * @return mixed
     */
    public function getDetailedControlSum()
    {
        return $this->detailedControlSum;
    }

    /**
     * @param mixed $detailedNumberOfTransactionsPerStatus
     */
    public function setDetailedNumberOfTransactionsPerStatus($detailedNumberOfTransactionsPerStatus)
    {
        $this->detailedNumberOfTransactionsPerStatus = $detailedNumberOfTransactionsPerStatus;
    }

    /**
     * @return mixed
     */
    public function getDetailedNumberOfTransactionsPerStatus()
    {
        return $this->detailedNumberOfTransactionsPerStatus;
    }

    /**
     * @param mixed $detailedStatus
     */
    public function setDetailedStatus($detailedStatus)
    {
        $this->detailedStatus = $detailedStatus;
    }

    /**
     * @return mixed
     */
    public function getDetailedStatus()
    {
        return $this->detailedStatus;
    }

    /**
     * @param mixed $originalControlSum
     */
    public function setOriginalControlSum($originalControlSum)
    {
        $this->originalControlSum = $originalControlSum;
    }

    /**
     * @return mixed
     */
    public function getOriginalControlSum()
    {
        return $this->originalControlSum;
    }

    /**
     * @param mixed $originalMessageIdentification
     */
    public function setOriginalMessageIdentification($originalMessageIdentification)
    {
        $this->originalMessageIdentification = $originalMessageIdentification;
    }

    /**
     * @return mixed
     */
    public function getOriginalMessageIdentification()
    {
        return $this->originalMessageIdentification;
    }

    /**
     * @param mixed $originalMessageNameIdentification
     */
    public function setOriginalMessageNameIdentification($originalMessageNameIdentification)
    {
        $this->originalMessageNameIdentification = $originalMessageNameIdentification;
    }

    /**
     * @return mixed
     */
    public function getOriginalMessageNameIdentification()
    {
        return $this->originalMessageNameIdentification;
    }

    /**
     * @param mixed $originalNumberOfTrnasactions
     */
    public function setOriginalNumberOfTransactions($originalNumberOfTransactions)
    {
        $this->originalNumberOfTransactions = $originalNumberOfTransactions;
    }

    /**
     * @return mixed
     */
    public function getOriginalNumberOfTransactions()
    {
        return $this->originalNumberOfTransactions;
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
     * @param DomBuilderInterface $domBuilder
     */
    public function accept(DomBuilderInterface $domBuilder)
    {
        $domBuilder->visitOriginalGroupInformation($this);
    }
}