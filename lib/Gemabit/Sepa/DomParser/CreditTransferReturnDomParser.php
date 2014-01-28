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

use Gemabit\Sepa\OriginalPaymentInformation;
use Gemabit\Sepa\TransactionInformation\CreditTransferTransactionInformation;
use Gemabit\Sepa\TransactionInformation\PaymentTypeInformation\CreditTransferPaymentTypeInformation;

/**
 * Used to parse the Dom-structure for the Direct Debit Return File
 *
 * Class CreditTransferReturnDomParser
 * @package Gemabit\Sepa
 * @subpackage Gemabit\Sepa\DomParser
 */
class CreditTransferReturnDomParser extends BaseDomParser
{

    /**
     * @var OriginalPaymentInformation
     */
    protected $originalPaymentInformation;

	/**
     * Has expected, this is the constructor
     */
	function __construct($filepath) {
        parent::__construct($filepath);

        $originalPaymentInformation      = $this->doc->getElementsByTagName('OrgnlPmtInfAndSts')->item(0);

        $this->fillOriginalPaymentInformation($originalPaymentInformation);
    }

	/**
     * Fills up the OriginalPaymentInformation with the given DOMElement
     */
    protected function fillOriginalPaymentInformation(\DOMElement $DOMOriginalPaymentInformation)
    {
        //Fetching the data
        $originalPaymentInformationIdentification = $this->getValue($DOMOriginalPaymentInformation, 'OrgnlPmtInfId');
        $originalNumberOfTransactions             = $this->getValue($DOMOriginalPaymentInformation, 'OrgnlNbOfTxs');
        $originalControlsum                       = $this->getValue($DOMOriginalPaymentInformation, 'OrgnlCtrlSum');
        $statusReasonInformationProprietary       = $this->getValue($DOMOriginalPaymentInformation, 'StsRsnInf.Rsn.Prtry');

        $this->originalPaymentInformation = new OriginalPaymentInformation();
        
        $this->originalPaymentInformation->setOriginalPaymentInformationIdentification($originalPaymentInformationIdentification);
        $this->originalPaymentInformation->setOriginalNumberOfTransactions($originalNumberOfTransactions);
        $this->originalPaymentInformation->setOriginalControlsum($originalControlsum);
        $this->originalPaymentInformation->setStatusReasonInformationProprietary($statusReasonInformationProprietary);
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
}
