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

namespace Gemabit\Sepa\DomParser;

use Gemabit\Sepa\GroupHeader;
use Gemabit\Sepa\OriginalGroupInformation;

/**
 * Used to parse the Dom-structure for the different types of SEPA files
 *
 * Class BaseDomParser
 * @package Gemabit\Sepa
 * @subpackage Gemabit\Sepa\DomParser
 */
abstract class BaseDomParser implements DomParserInterface
{
	/**
     * Document holder
     *
     * @var DOMDocument
     */    
    protected $doc;

    /**
     * Group Header holder
     *
     * @var GroupHeader
     */
    protected $groupHeader;

    /**
     * @var OriginalGroupInformation
     */
    protected $originalGroupInformation;

    /**
     * Has expected, this is the constructor
     */
	function __construct($filepath) {
        $this->doc = new \DOMDocument();
        $this->doc->load($filepath);

        $groupHeaderElement = $this->doc->getElementsByTagName('GrpHdr')->item(0);
        $originalGroupInformationElement = $this->doc->getElementsByTagName('OrgnlGrpInfAndSts')->item(0);
        $originalPaymentInformation      = $this->doc->getElementsByTagName('OrgnlPmtInfAndSts')->item(0);

        $this->fillGroupHeader($groupHeaderElement);
        $this->fillOriginalGroupInformation($originalGroupInformationElement);
        $this->fillOriginalPaymentInformation($originalPaymentInformation);
    }

    /**
     * Returns the node value of and element, regarding his path
     * @param \DOMElement $el
     * @param string $path
     * @return string|null
     */
    protected function getValue(\DOMElement $el, $path)
    {
        $segments = explode('.', $path);

        foreach ($segments as $tag) {
            $list = $el->getElementsByTagName($tag);
            if (is_null($list)) {
                return null;
            }
            if (is_null($el = $list->item(0))) {
                return null;
            }
        }

        return $el->nodeValue;
    }

    /**
     * Fills up the GroupHeader with the given DOMElement
     */
    protected function fillGroupHeader(\DOMElement $DOMGroupHeader)
    {
        $messageIdentification = $this->getValue($DOMGroupHeader, 'MsgId');
        $creationDate          = $this->getValue($DOMGroupHeader, 'CreDtTm');
        //@todo find a better solution
        $creationDateTime = \DateTime::createFromFormat('Y-m-j H-i-s', date('Y-m-j H-i-s', strtotime($creationDate)));
        //@todo Map this fields
        $initiatingPartyName  = '';
        $numberOfTransactions = '';
        $controlSumCents      = '';
        $initiatingPartyId    = '';

    	$this->groupHeader = new GroupHeader($messageIdentification, $initiatingPartyName);
    	$this->groupHeader->setCreationDateTime($creationDateTime);
    	$this->groupHeader->setNumberOfTransactions($numberOfTransactions);
    	$this->groupHeader->setControlSumCents($controlSumCents);
    	$this->groupHeader->setInitiatingPartyId($initiatingPartyId);
    }

    /**
     * Fills up the OriginalGroupInformation with the given DOMElement
     */
    protected function fillOriginalGroupInformation(\DOMElement $DOMOriginalGroupInformation)
    {
        $originalMessageIdentification         = $this->getValue($DOMOriginalGroupInformation, 'OrgnlMsgId');
        $originalMessageNameIdentification     = $this->getValue($DOMOriginalGroupInformation, 'OrgnlMsgNmId');
        $originalNumberOfTransactions          = $this->getValue($DOMOriginalGroupInformation, 'OrgnlNbOfTxs');
        $originalControlSum                    = $this->getValue($DOMOriginalGroupInformation, 'OrgnlCtrlSum');
        $statusReasonInformationProprietary    = $this->getValue($DOMOriginalGroupInformation, 'StsRsnInf.Rsn.Prtry');
        
        $detailedNumberOfTransactionsPerStatus = $this->getValue($DOMOriginalGroupInformation, 'NbOfTxsPerSts.DtldNbOfTxs');
        $detailedStatus                        = $this->getValue($DOMOriginalGroupInformation, 'NbOfTxsPerSts.DtldSts');
        $detailedControlSum                    = $this->getValue($DOMOriginalGroupInformation, 'NbOfTxsPerSts.DtldCtrlSum');

        $this->originalGroupInformation = new OriginalGroupInformation();

        $this->originalGroupInformation->setOriginalMessageIdentification($originalMessageIdentification);
        $this->originalGroupInformation->setOriginalMessageNameIdentification($originalMessageNameIdentification);
        $this->originalGroupInformation->setOriginalNumberOfTransactions($originalNumberOfTransactions);
        $this->originalGroupInformation->setOriginalControlSum($originalControlSum);
        $this->originalGroupInformation->setStatusReasonInformationProprietary($statusReasonInformationProprietary);
        $this->originalGroupInformation->setDetailedNumberOfTransactionsPerStatus($detailedNumberOfTransactionsPerStatus);
        $this->originalGroupInformation->setDetailedStatus($detailedStatus);
        $this->originalGroupInformation->setDetailedControlSum($detailedControlSum);
    }

    /**
     * Returns the GroupHeader Information of the document
     *
     * @return GroupHeader
     */
    public function getGroupHeader()
    {
        return $this->groupHeader;
    }

    /**
     * Returns the Original Group Information of the document
     *
     * @return OriginalGroupInformation
     */
    public function getOriginalGroupInformation()
    {
        return $this->originalGroupInformation;
    }
}