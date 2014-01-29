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

namespace Gemabit\Sepa\DomBuilder;

use Gemabit\Sepa\GroupHeader;

/**
 * Used to build the Dom-structure for the different types of SEPA files
 * It's basically a ripoff of Digitick's BaseDomBuilder, the diference is that it implements a diferent Interface
 * 
 * Class BaseDomBuilder
 * @package Gemabit\Sepa
 * @subpackage Gemabit\Sepa\DomBuilder
 */
abstract class BaseDomBuilder implements DomBuilderInterface
{
    const INITIAL_STRING = '<?xml version="1.0" encoding="UTF-8"?><Document xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns="urn:iso:std:iso:20022:tech:xsd:%s"></Document>';

    protected $doc;

    protected $root;

    /**
     * @var \DOMElement
     */
    protected $file = null;

    /**
     * @var \DOMELement
     */
    protected $originalGroupInformation = null;
    
    /**
     * @var \DOMELement
     */
    protected $originalPaymentInformation = null;

    function __construct($painFormat) {
        $this->doc = new \DOMDocument('1.0', 'UTF-8');
        $this->doc->formatOutput = true;
        $this->root = $this->doc->createElement('Document');
        $this->root->setAttribute('xmlns', sprintf("urn:iso:std:iso:20022:tech:xsd:%s", $painFormat));
        $this->root->setAttribute('xmlns:xsi',"http://www.w3.org/2001/XMLSchema-instance");
        $this->doc->appendChild($this->root);
    }

    /**
     * @param $name
     * @param null $value
     * @return \DOMElement
     */
    protected function createElement($name, $value = null) {
        if($value){
            $elm = $this->doc->createElement($name);
            $elm->appendChild($this->doc->createTextNode($value));
            return $elm;
        } else {
            return $this->doc->createElement($name);
        }
    }

    /**
     * @return string
     */
    public function asXml(){
        return $this->doc->saveXML();
    }

    /**
     * Format an integer as a monetary value.
     */
    protected function intToCurrency($amount)
    {
        return sprintf("%01.2F", ($amount / 100));
    }

    /**
     * Add GroupHeader Information to the document
     *
     * @param GroupHeader $groupHeader
     * @return mixed
     */
    public function visitGroupHeader(GroupHeader $groupHeader) {
        $groupHeaderTag = $this->doc->createElement('GrpHdr');
        $messageId = $this->createElement('MsgId', $groupHeader->getMessageIdentification());
        $groupHeaderTag->appendChild($messageId);
        $creationDateTime = $this->createElement('CreDtTm', $groupHeader->getCreationDateTime()->format('Y-m-d\TH:i:s\Z'));
        $groupHeaderTag->appendChild($creationDateTime);
        $groupHeaderTag->appendChild($this->createElement('NbOfTxs', $groupHeader->getNumberOfTransactions()));
        $groupHeaderTag->appendChild($this->createElement('CtrlSum', $this->intToCurrency($groupHeader->getControlSumCents())));
        $groupHeaderTag->appendChild($this->createElement('GrpRvsl', $groupHeader->getGroupReversal()));
        $initiatingParty = $this->createElement('InitgPty');
        $initiatingPartyName =  $this->createElement('Nm', $groupHeader->getInitiatingPartyName());
        $initiatingParty->appendChild($initiatingPartyName);

        if ($groupHeader->getInitiatingPartyId() !== null) {
            $id = $this->createElement('Id', $groupHeader->getInitiatingPartyId());
            $other = $this->createElement('Othr');
            $private_id = $this->createElement('PrvtId');
            $parent_id = $this->createElement("Id");

            $other->appendChild($id);
            $private_id->appendChild($other);
            $parent_id->appendChild($private_id);
            $initiatingParty->appendChild($parent_id);
        }
        $groupHeaderTag->appendChild($initiatingParty);
        $this->file->appendChild($groupHeaderTag);
    }


    /**
     * @param string $bic
     * @return \DOMElement
     */
    protected function getFinancialInstitutionElement($bic) {
        $finInstitution = $this->createElement('FinInstnId');
        $finInstitution->appendChild($this->createElement('BIC', $bic));

        return $finInstitution;
    }


    /**
     * @param string $iban
     * @return \DOMElement
     */
    public function getIbanElement($iban) {
        $id = $this->createElement('Id');
        $id->appendChild($this->createElement('IBAN', $iban));

        return $id;
    }


    /**
     * @param string $remittenceInformation
     * @return \DOMElement
     */
    public function getRemittenceElement($unstructured = false, $reference = false, $code = false) {
        $remittanceInformation = $this->createElement('RmtInf');

        if ($unstructured!==false) {
            $remittanceInformation->appendChild($this->createElement('Ustrd', $unstructured));
        }

        if ($reference !== false || $code !== false) {
            //create the code element
            $strd = $this->createElement('Strd');

            if ($reference !== false) {
                $creditTransferInformation = $this->createElement("CdtrRefInf");
                $tp = $this->createElement('Tp');
                $cdorparty = $this->createElement('CdOrPrty');
                $cd = $this->createElement('Cd', $code);

                $cdorparty->appendChild($cd);
                $tp->appendChild($cdorparty);
                $creditTransferInformation->appendChild($tp);
                $strd->appendChild($creditTransferInformation);
            }
            //append reference if it exists
            if ($reference) {
                $strd->appendChild($this->createElement('Ref', $reference));
            }

            $remittanceInformation->appendChild($strd);
        }

        return $remittanceInformation;
    }
}
