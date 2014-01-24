<?php
/**
 * Created by PhpStorm.
 * User: rlopes
 * Date: 24/01/14
 * Time: 12:28
 */

namespace Gemabit\Sepa\TransactionInformation\PaymentTypeInformation;


class DirectDebitPaymentTypeInformation extends BasePaymentTypeInformation
{

    /**
     * @var string code for the general purpose i.e. "SCOR"
     */
    protected $localInstrumentCode;

    /**
     * @var string code for the seuqnce type i.e. "OOFF"
     */
    protected $sequenceType;

    /**
     * @param mixed $localInstrumentCode
     */
    public function setLocalInstrumentCode($localInstrumentCode)
    {
        $this->localInstrumentCode = $localInstrumentCode;
    }

    /**
     * @return mixed
     */
    public function getLocalInstrumentCode()
    {
        return $this->localInstrumentCode;
    }

    /**
     * @param mixed $sequenceType
     */
    public function setSequenceType($sequenceType)
    {
        $this->sequenceType = $sequenceType;
    }

    /**
     * @return mixed
     */
    public function getSequenceType()
    {
        return $this->sequenceType;
    }


} 