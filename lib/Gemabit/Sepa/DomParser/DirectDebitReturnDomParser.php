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

use Gemabit\Sepa\OriginalGroupInformation;
use Gemabit\Sepa\OriginalPaymentInformation;
use Gemabit\Sepa\TransactionInformation;

/**
 * Used to parse the Dom-structure for the Direct Debit Return File
 *
 * Class DirectDebitReturnDomParser
 * @package Gemabit\Sepa
 * @subpackage Gemabit\Sepa\DomParser
 */
class DirectDebitReturnDomParser extends BaseDomParser
{
	protected $originalGroupInformation;

	protected $originalPaymentInformation;

	protected $transactionInformation;

	function __construct($filepath) {
		parent::__construct($filepath);

        $this->fillOriginalGroupInformation($this->doc->getElementsByTagName('OrgnlGrplnfAndSts'));
        $this->fillOriginalPaymentInformation($this->doc->getElementsByTagName('OrgnlPmtlnfAndSts'));
        $this->fillTransactionInformation($this->doc->getElementsByTagName('TxlnfAndSts'));
    }

    /**
     * Fills up the OriginalGroupInformation with the given DOMElement
     */
    protected function fillOriginalGroupInformation(\DOMElement $DOMOriginalGroupInformation)
    {
    }

    /**
     * Fills up the OriginalPaymentInformation with the given DOMElement
     */
    protected function fillOriginalPaymentInformation(\DOMElement $DOMOriginalPaymentInformation)
    {
    }

    /**
     * Fills up the TransactionInformation with the given DOMElement
     */
    protected function fillTransactionInformation(\DOMElement $DOMTransactionInformation)
    {
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

    /**
     * Returns the Original Payment Information of the document
     *
     * @return OriginalPaymentInformation
     */
    public function getOriginalPaymentInformation()
    {
    	return $this->originalPaymentInformation;
    }

    /**
     * Returns the Transactions Information of the document
     *
     * @return TransactionInformation
     */
    public function getTransactionInformation()
    {
    	return $this->transactionInformation;
    }

}
