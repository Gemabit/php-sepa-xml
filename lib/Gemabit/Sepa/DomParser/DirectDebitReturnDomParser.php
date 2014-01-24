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
use Gemabit\Sepa\TransactionInformation\DirectDebitTransactionInformation;
use Gemabit\Sepa\TransactionInformation\PaymentTypeInformation\DirectDebitPaymentTypeInformation;
//use Gemabit\Sepa\TransactionInformation;

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

	function __construct($filepath) {
		parent::__construct($filepath);

        $originalGroupInformationElement = $this->doc->getElementsByTagName('OrgnlGrpInfAndSts')->item(0);
        $originalPaymentInformation      = $this->doc->getElementsByTagName('OrgnlPmtInfAndSts')->item(0);

        $this->fillOriginalGroupInformation($originalGroupInformationElement);
        $this->fillOriginalPaymentInformation($originalPaymentInformation);
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
        //@todo Map the following fileds
        $detailedControlSum                    = '';
        $detailedNumberOfTransactionsPerStatus = '';
        $detailedStatus                        = '';

    	$this->originalGroupInformation = new OriginalGroupInformation();

        $this->originalGroupInformation->setOriginalMessageIdentification($originalMessageIdentification);
        $this->originalGroupInformation->setOriginalMessageNameIdentification($originalMessageNameIdentification);
        $this->originalGroupInformation->setOriginalNumberOfTransactions($originalNumberOfTransactions);
        $this->originalGroupInformation->setOriginalControlSum($originalControlSum);
        $this->originalGroupInformation->setStatusReasonInformationProprietary($statusReasonInformationProprietary);
        $this->originalGroupInformation->setDetailedControlSum($detailedControlSum);
        $this->originalGroupInformation->setDetailedNumberOfTransactionsPerStatus($detailedNumberOfTransactionsPerStatus);
        $this->originalGroupInformation->setDetailedStatus($detailedStatus);
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

        //Lets fill up the transactions
        $transactionInformationNodeList = $DOMOriginalPaymentInformation->getElementsByTagName('TxInfAndSts');
        foreach ($transactionInformationNodeList as $transactionInformationElement) {
            
            //Getting the DD Transaction Info
            $statusIdentification                         = $this->getValue($transactionInformationElement, 'StsId');
            $originalEndToEndIdentification               = $this->getValue($transactionInformationElement, 'OrgnlEndToEndId');
            $statusReasonInformationCode                  = $this->getValue($transactionInformationElement, 'StsRsnInf.Rsn.Cd');
            $originalTransactionReferenceInstructedAmount = $this->getValue($transactionInformationElement, 'OrgnlTxRef.Amt.InstdAmt');
            $requestedCollectionDate                      = $this->getValue($transactionInformationElement, 'OrgnlTxRef.ReqdExctnDt');
            $creditorSchemeIdentification                 = $this->getValue($transactionInformationElement, 'OrgnlTxRef.CdtrSchmeld.Id.PrvId.Othr.Id');
            $paymentMethod                                = $this->getValue($transactionInformationElement, 'OrgnlTxRef.PmtMtd');
            $mandateIdentification                        = $this->getValue($transactionInformationElement, 'OrgnlTxRef.MndtRltlnf.MndtId');
            $mandateDateOfSignature                       = $this->getValue($transactionInformationElement, 'OrgnlTxRef.MndtRltlnf.DtOfSgntr');
            $remittanceInformationUnstructured            = $this->getValue($transactionInformationElement, 'OrgnlTxRef.RmtInf.Ustrd');
            $debtorName                                   = $this->getValue($transactionInformationElement, 'OrgnlTxRef.Dbtr.Nm');
            $debtorIBAN                                   = $this->getValue($transactionInformationElement, 'OrgnlTxRef.DbtrAcct.Id.IBAN');
            $debtorBIC                                    = $this->getValue($transactionInformationElement, 'OrgnlTxRef.DbtrAgt.FinInstnId.BIC');
            $creditorBIC                                  = $this->getValue($transactionInformationElement, 'OrgnlTxRef.CdtrAgt.FinInstnId.BIC');
            $creditorName                                 = $this->getValue($transactionInformationElement, 'OrgnlTxRef.Cdtr.Nm');
            $creditorIBAN                                 = $this->getValue($transactionInformationElement, 'OrgnlTxRef.CdtrAcct.Id.IBAN');
            //Payment information
            $categoryPurposeCode = $this->getValue($transactionInformationElement, 'OrgnlTxRef.PmtTpInf.CtgyPurp.Cd');
            $sequenceType        = $this->getValue($transactionInformationElement, 'OrgnlTxRef.PmtTpInf.SeqTp');
            
            $paymentTypeInformation = new DirectDebitPaymentTypeInformation();
            $paymentTypeInformation->setCategoryPurposeCode($categoryPurposeCode);
            $paymentTypeInformation->setSequenceType($sequenceType);

            //Setting the values onto the DirectDebitTransactionInformation Object
            $directDebitTransactionInformation = new DirectDebitTransactionInformation();
            $directDebitTransactionInformation->setStatusIdentification($statusIdentification);
            $directDebitTransactionInformation->setOriginalEndToEndIdentification($originalEndToEndIdentification);
            $directDebitTransactionInformation->setStatusReasonInformationCode($statusReasonInformationCode);
            $directDebitTransactionInformation->setOriginalTransactionReferenceInstructedAmount($originalTransactionReferenceInstructedAmount);
            $directDebitTransactionInformation->setRequestedCollectionDate($requestedCollectionDate);
            $directDebitTransactionInformation->setCreditorSchemeIdentification($creditorSchemeIdentification);
            $directDebitTransactionInformation->setPaymentMethod($paymentMethod);
            $directDebitTransactionInformation->setMandateIdentification($mandateIdentification);
            $directDebitTransactionInformation->setMandateDateOfSignature($mandateDateOfSignature);
            $directDebitTransactionInformation->setRemittanceInformationUnstructured($remittanceInformationUnstructured);
            $directDebitTransactionInformation->setDebtorName($debtorName);
            $directDebitTransactionInformation->setDebtorIBAN($debtorIBAN);
            $directDebitTransactionInformation->setDebtorBIC($debtorBIC);
            $directDebitTransactionInformation->setCreditorBIC($creditorBIC);
            $directDebitTransactionInformation->setCreditorName($creditorName);
            $directDebitTransactionInformation->setCreditorIBAN($creditorIBAN);
            //Adding the payment type info to the transaction
            $directDebitTransactionInformation->setPaymentTypeInformation($paymentTypeInformation);
            //Adding the transaction
            $this->originalPaymentInformation->addTransaction($directDebitTransactionInformation);
        }
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
}
