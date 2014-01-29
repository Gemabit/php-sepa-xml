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

use Gemabit\Sepa\OriginalGroupInformation;
use Gemabit\Sepa\OriginalPaymentInformation;
use Gemabit\Sepa\ReturnFile\ReturnFileInterface;

class DirectDebitReversalDomBuilder extends BaseDomBuilder
{
    function __construct($painFormat = 'pain.007.001.02')
    {
        parent::__construct($painFormat);
    }

    /**
     * Build the root of the document
     *
     * @param ReturnFileInterface $returnFile
     * @return mixed
     */
    public function visitTransferFile(ReturnFileInterface $returnFile)
    {
        $this->currentTransfer = $this->doc->createElement('CstmrPmtRvsl');
        $this->root->appendChild($this->currentTransfer);
    }

    /**
     * Crawl OriginalGroupInformation
     *
     * @param OriginalGroupInformation $originalGroupInformation
     * @return mixed
     */
    public function visitOriginalGroupInformation(OriginalGroupInformation $originalGroupInformation)
    {
        //Initialising the Original Group Information root node (parent)
    	$this->originalGroupInformation    = $this->createElement('OrgnlGrpInf');

        //Setting up the child nodes
        $originalMessageIdentification     = $this->createElement('OrgnlMsgId', $originalGroupInformation->getOriginalMessageIdentification());
        $originalMessageNameIdentification = $this->createElement('OrgnlMsgNmId', $originalGroupInformation->getOriginalMessageNameIdentification());
        
        //Adding the child nodes to the parent
        $this->originalGroupInformation->appendChild($originalMessageIdentification);
        $this->originalGroupInformation->appendChild($originalMessageNameIdentification);
    }

    /**
     * Crawl OriginalPaymentInformation
     *
     * @param OriginalPaymentInformation $originalPaymentInformation
     * @return mixed
     */
    public function visitOriginalPaymentInformation(OriginalPaymentInformation $originalPaymentInformation)
    {
        //Initialising the Original Payment Information root node (parent)
        $this->originalPaymentInformation    = $this->createElement('OrgnlPmtInfAndRvsl');
        
        $originalPaymentInformationIdentification = $this->createElement('OrgnlPmtInfId', $originalPaymentInformation->getOriginalPaymentInformationIdentification());
        $originalNumberOfTransactions             = $this->createElement('OrgnlNbOfTxs', $originalPaymentInformation->getOriginalNumberOfTransactions());
        $originalControlSum                       = $this->createElement('OrgnlCtrlSum', $originalPaymentInformation->getOriginalControlsum());
        $paymentInformationReversal               = $this->createElement('PmtInfRvsl', $originalPaymentInformation->getPaymentInformationReversal());
        
        //Adding the child nodes to the parent
        $this->originalPaymentInformation->appendChild($originalPaymentInformationIdentification);
        $this->originalPaymentInformation->appendChild($originalNumberOfTransactions);
        $this->originalPaymentInformation->appendChild($originalControlSum);
        $this->originalPaymentInformation->appendChild($paymentInformationReversal);

        //Initialising transactions node
        $transactionInformation = $this->createElement('TxInf');
        //Dealing with the transaction information
        $transactions = $originalPaymentInformation->getTransactions();
        if (!is_null($transactions)) {
            foreach ($transactions as $transaction) {
                $transactionInformation->appendChild('OrgnlEndToEndId', $transaction->getOriginalEndToEndIdentification());
                $transactionInformation->appendChild('OrgnlInstdAmt', $transaction->getOriginalInstructedAmount())->setAttribute('Ccy', 'EUR'));
                $transactionInformation->appendChild('RvslRsnlf')->appendChild('Rsn')->appendChild('Cd', $transaction->getReversalReasonInformationCode())));

                $originalTransactionReference = $this->createElement('OrgnlTxRef');
                // @todo convert to string
                $originalTransactionReference->appendChild('ReqdColtltnDt', $transaction->getRequestedCollectionDate());
                $originalTransactionReference->appendChild('CdtrSchmeId')->appendChild('Id')->appendChild('PrvtId')->appendChild('Othr')->appendChild('Id', $transaction->getCreditorSchemeIdentification());
                $paymentTypeInformation = $transaction->getPaymentTypeInformation();
                $originalTransactionReference->appendChild('PmtTpInf')->appendChild('SeqTp', $paymentTypeInformation->getSequenceType());
                $mandateRelatedInformation = $this->createElement('MndtRltInf');
                
                
                
            }
        }
        $this->originalPaymentInformation->appendChild($transactionInformation);

    }
}