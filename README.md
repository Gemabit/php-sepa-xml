php-sepa-xml
============

Extends Digitick original lib to allow return file parsing and Direct Debit Reversion


[![Donate](https://pledgie.com/campaigns/23846.png?skin_name=chrome)](https://pledgie.com/campaigns/23846)

##Reversal Direct Debit

To create a Reversal Direct Debit xml file, using the example that's on page 111 of this [![document](http://www.bportugal.pt/SiteCollectionDocuments/DPG-SP-SEPA-Manual-C2B-XML.pdf), you may do as follows.

```php
use Gemabit\Sepa\GroupHeader;
use Gemabit\Sepa\OriginalGroupInformation;
use Gemabit\Sepa\OriginalPaymentInformation;
use Gemabit\Sepa\TransactionInformation\DirectDebitReversalTransactionInformation;
use Gemabit\Sepa\TransactionInformation\PaymentTypeInformation\DirectDebitPaymentTypeInformation;
use Gemabit\Sepa\ReversalFile\DirectDebitReversalFile;
use Gemabit\Sepa\DomBuilder\DomBuilderFactory;

//Lest create a Direct Debit Reversal xml file

//1. Lest create a Group Header
$groupHeader = new GroupHeader('MNO/RV001/2011', 'MNO Editores, SA');
$groupHeader->setNumberOfTransactions(1);
$groupHeader->setControlSumCents(2000);
$groupHeader->setGroupReversal('false');
$groupHeader->setInitiatingPartyId('PT08ZZZ200480');

//2. We need a Original Group Information
$originalGroup = new OriginalGroupInformation('MNO/DD001/2011');

//3. We also need a Original Payment Information
$originalPayment = new OriginalPaymentInformation();
$originalPayment->setOriginalPaymentInformationIdentification('DD001');
$originalPayment->setOriginalNumberOfTransactions(3);
$originalPayment->setOriginalControlsum(4123);
$originalPayment->setPaymentInformationReversal('false');

//4. Now lets create a transaction
$transaction = new DirectDebitReversalTransactionInformation();
$transaction->setOriginalEndToEndIdentification('DD001-201112050002');
$transaction->setOriginalInstructedAmount(2000);
$transaction->setReversalReasonInformationCode('AM05');
$transaction->setRequestedCollectionDate(DateTime::createFromFormat('Y-m-j', '2011-12-08'));
$transaction->setCreditorSchemeIdentification('PT08ZZZ200480');
$paymentTypeInformation = new DirectDebitPaymentTypeInformation();
$paymentTypeInformation->setSequenceType('RCUR');
$transaction->setPaymentTypeInformation($paymentTypeInformation);
$transaction->setMandateIdentification('MNO21987');
$transaction->setDateOfSignature(DateTime::createFromFormat('Y-m-j', '2011-08-05'));
$transaction->setDebtorName('STU Publicaciones');
$transaction->setDebtorIBAN('ES1409870001110102030001');
$transaction->setDebtorBIC('CCCCESMM');
$transaction->setCreditorName('MNO Editores, SA');
$transaction->setCreditorIBAN('PT50089100001020304050616');
$transaction->setCreditorBIC('BBBBPTPL');

//5. Once we have our payment information and our transaction, we need to add it 
$originalPayment->addTransaction($transaction);

//6. Finishing it up
$sepaFile = new DirectDebitReversalFile($groupHeader);
$sepaFile->setOriginalGroupInformation($originalGroup);
$sepaFile->addOriginalPaymentInformation($originalPayment);

// Attach a dombuilder to the sepaFile to create the XML output
$domBuilder = DomBuilderFactory::createDomBuilder($sepaFile);

$xmlString = $domBuilder->asXml();

```