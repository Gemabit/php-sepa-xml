<?php
/**
 * Created by PhpStorm.
 * User: rlopes
 * Date: 24/01/14
 * Time: 12:39
 */

namespace Gemabit\Sepa\TransactionInformation\PaymentTypeInformation;


class CreditTransferPaymentTypeInformation extends BasePaymentTypeInformation
{
    /**
     * @var string service type
     */
    protected $localInstrumentProprietary;

    /**
     * @param mixed $localInstrumentProprietary
     */
    public function setLocalInstrumentProprietary($localInstrumentProprietary)
    {
        $this->localInstrumentProprietary = $localInstrumentProprietary;
    }

    /**
     * @return mixed
     */
    public function getLocalInstrumentProprietary()
    {
        return $this->localInstrumentProprietary;
    }


} 