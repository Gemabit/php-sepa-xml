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
                // <OrgnlEndToEndId>
                $originalEndToEndIdentification = $this->createElement('OrgnlEndToEndId', $transaction->getOriginalEndToEndIdentification());
                $transactionInformation->appendChild($originalEndToEndIdentification);
                
                // <OrgnlInstdAmt>
                $originalInstructedAmount = $this->createElement('OrgnlInstdAmt', $transaction->getOriginalInstructedAmount());
                $originalInstructedAmount->setAttribute('Ccy', 'EUR');

                $transactionInformation->appendChild($originalInstructedAmount);
                
                // <RvslRsnlf>
                $reversalReasonInformation = $this->createElement('RvslRsnlf');
                $reason                    = $this->createElement('Rsn');
                $code                      = $this->createElement('Cd', $transaction->getReversalReasonInformationCode());

                $reason->appendChild($code);
                $reversalReasonInformation->appendChild($reason);
                $transactionInformation->appendChild($reversalReasonInformation);

                // <OrgnlTxRef> Every node that follows
                $originalTransactionReference = $this->createElement('OrgnlTxRef');
                
                // <ReqdColtltnDt>
                $requestedCollectionDate = $this->createElement('ReqdColtltnDt', $transaction->getRequestedCollectionDate()->format('Y-m-d'));
                $originalTransactionReference->appendChild($requestedCollectionDate);
                
                // <CdtrSchmeId>
                $creditorSchemeId = $this->createElement('CdtrSchmeId');
                $id = $this->createElement('Id');
                $privateId = $this->createElement('PrvtId');
                $other = $this->createElement('Othr');
                $other->appendChild($this->createElement('Id', $transaction->getCreditorSchemeIdentification()));

                $privateId->appendChild($other);
                $id->appendChild($privateId);
                $creditorSchemeId->appendChild($id);
                $originalTransactionReference->appendChild($creditorSchemeId);

                // <PmtTpInf>
                $paymentTypeInformation = $transaction->getPaymentTypeInformation();
                $sequenceType           = $this->createElement('SeqTp', $paymentTypeInformation->getSequenceType());

                $originalTransactionReference->appendChild($this->createElement('PmtTpInf', $sequenceType));
                
                // <MndtRltInf>
                $mandateRelatedInformation = $this->createElement('MndtRltInf');
                $mandateIdentification     = $this->createElement('MndtId', $transaction->getMandateIdentification());
                $dateOfSignature           = $this->createElement('DtOfSgntr', $transaction->getDateOfSignature()->format('Y-m-d'));
                
                $mandateRelatedInformation->appendChild($mandateIdentification);
                $mandateRelatedInformation->appendChild($dateOfSignature);
                $originalTransactionReference->appendChild($mandateRelatedInformation);

                // <Dbtr>
                $debtor = $this->createElement('Dbtr');
                $name   = $this->createElement('Nm', $transaction->getDebtorName());

                $debtor->appendChild($name);
                $originalTransactionReference->appendChild($debtor);
                
                // <DbtrAcct>
                $debtorAccount = $this->createElement('DbtrAcct');
                $id            = $this->createElement('Id');
                $iban          = $this->createElement('IBAN', $transaction->getDebtorIBAN());

                $id->appendChild($iban);
                $debtorAccount->appendChild($id);
                $originalTransactionReference->appendChild($debtorAccount);
                
                // <DbtrAgt>
                $debtorAgent = $this->createElement('DbtrAgt');
                $financialId = $this->createElement('FinInstnId');
                $bic         = $this->createElement('BIC', $transaction->getDebtorBIC());

                $financialId->appendChild($bic);
                $debtorAgent->appendChild($financialId);
                $originalTransactionReference->appendChild($debtorAgent);

                // <CdtrAgt>
                $creditorAgent = $this->createElement('CdtrAgt');
                $financialId = $this->createElement('FinInstnId');
                $bic         = $this->createElement('BIC', $transaction->getCreditorBIC());

                $financialId->appendChild($bic);
                $creditorAgent->appendChild($financialId);
                $originalTransactionReference->appendChild($creditorAgent);
                
                // <Cdtr>
                $creditor = $this->createElement('Cdtr');
                $name     = $this->createElement('Nm', $transaction->getCreditorName());

                $creditor->appendChild($name);
                $originalTransactionReference->appendChild($creditor);

                // <CdtrAcct>
                $creditorAccount = $this->createElement('CdtrAcct');
                $id              = $this->createElement('Id');
                $iban            = $this->createElement('IBAN', $transaction->getCreditorIBAN());

                $id->appendChild($iban);
                $creditorAccount->appendChild($id);
                $originalTransactionReference->appendChild($creditorAccount);

                $transactionInformation->appendChild($originalTransactionReference);
            }
        }
        $this->originalPaymentInformation->appendChild($transactionInformation);
    }
}