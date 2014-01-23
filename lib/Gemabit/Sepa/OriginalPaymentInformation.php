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


class OriginalPaymentInformation
{

    /**
     * @var string Unambiguously identifies the original message
     */
    protected $originalMessageIdentification;

    /**
     * @var string Identifies the original type of file
     */
    protected $originalMessageNameIdentification;

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

    public function __construct()
    {

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
     * @param string $originalMessageIdentification
     */
    public function setOriginalMessageIdentification($originalMessageIdentification)
    {
        $this->originalMessageIdentification = $originalMessageIdentification;
    }

    /**
     * @return string
     */
    public function getOriginalMessageIdentification()
    {
        return $this->originalMessageIdentification;
    }

    /**
     * @param string $originalMessageNameIdentification
     */
    public function setOriginalMessageNameIdentification($originalMessageNameIdentification)
    {
        $this->originalMessageNameIdentification = $originalMessageNameIdentification;
    }

    /**
     * @return string
     */
    public function getOriginalMessageNameIdentification()
    {
        return $this->originalMessageNameIdentification;
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