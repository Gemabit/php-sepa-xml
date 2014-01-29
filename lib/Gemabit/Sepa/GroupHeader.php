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
use Digitick\Sepa\Util\StringHelper;

class GroupHeader
{

    /**
     * Whether this is a test Transaction
     *
     * @var boolean
     */
    protected $isTest;

    /**
     * @var string Unambiguously identify the message.
     */
    protected $messageIdentification;

    /**
     * The initiating Party for this payment
     *
     * @var string
     */
    protected $initiatingPartyId;

    /**
     * @var int
     */
    protected $numberOfTransactions = 0;

    /**
     * @var int
     */
    protected $controlSumCents = 0;

    /**
     * @var string
     */
    protected $initiatingPartyName;

    /**
     * @var \DateTime
     */
    protected $creationDateTime;

    /**
     * @var string
     */
    protected $groupReversal;

    /**
     * @param $messageIdentification
     * @param $isTest
     * @param $initiatingPartyName
     */
    function __construct($messageIdentification, $initiatingPartyName, $isTest = false)
    {
        $this->messageIdentification = $messageIdentification;
        $this->isTest = $isTest;
        $this->initiatingPartyName = StringHelper::sanitizeString($initiatingPartyName);
        $this->creationDateTime = new \DateTime();
    }

    public function accept(DomBuilderInterface $domBuilder)
    {
        $domBuilder->visitGroupHeader($this);
    }

    /**
     * @param int $controlSumCents
     */
    public function setControlSumCents($controlSumCents)
    {
        $this->controlSumCents = $controlSumCents;
    }

    /**
     * @return int
     */
    public function getControlSumCents()
    {
        return $this->controlSumCents;
    }

    /**
     * @param string $initiatingPartyId
     */
    public function setInitiatingPartyId($initiatingPartyId)
    {
        $this->initiatingPartyId = $initiatingPartyId;
    }

    /**
     * @return string
     */
    public function getInitiatingPartyId()
    {
        return $this->initiatingPartyId;
    }

    /**
     * @param string $initiatingPartyName
     */
    public function setInitiatingPartyName($initiatingPartyName)
    {
        $this->initiatingPartyName = StringHelper::sanitizeString($initiatingPartyName);
    }

    /**
     * @return string
     */
    public function getInitiatingPartyName()
    {
        return $this->initiatingPartyName;
    }

    /**
     * @param boolean $isTest
     */
    public function setIsTest($isTest)
    {
        $this->isTest = $isTest;
    }

    /**
     * @return boolean
     */
    public function getIsTest()
    {
        return $this->isTest;
    }

    /**
     * @param string $messageIdentification
     */
    public function setMessageIdentification($messageIdentification)
    {
        $this->messageIdentification = $messageIdentification;
    }

    /**
     * @return string
     */
    public function getMessageIdentification()
    {
        return $this->messageIdentification;
    }

    /**
     * @param int $numberOfTransactions
     */
    public function setNumberOfTransactions($numberOfTransactions)
    {
        $this->numberOfTransactions = $numberOfTransactions;
    }

    /**
     * @return int
     */
    public function getNumberOfTransactions()
    {
        return $this->numberOfTransactions;
    }

    /**
     * @return \DateTime
     */
    public function getCreationDateTime()
    {
        return $this->creationDateTime;
    }

    /**
     * @return \DateTime
     */
    public function setCreationDateTime(\DateTime $creationDateTime)
    {
        $this->creationDateTime = $creationDateTime;
    }

    /**
     * @param string $groupReversal
     */
    public function setGroupReversal($groupReversal)
    {
        $this->groupReversal = $groupReversal;
    }

    /**
     * @return string
     */
    public function getGroupReversal()
    {
        return $this->groupReversal;
    }
}