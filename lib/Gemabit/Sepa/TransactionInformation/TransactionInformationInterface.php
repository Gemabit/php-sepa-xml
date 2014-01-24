<?php
/**
 * Created by PhpStorm.
 * User: rlopes
 * Date: 23/01/14
 * Time: 17:44
 */

namespace Gemabit\Sepa\TransactionInformation;


use Gemabit\Sepa\TransactionInformation\PaymentTypeInformation\BasePaymentTypeInformation;

interface TransactionInformationInterface
{
    public function getPaymentTypeInformation();

    public function setPaymentTypeInformation(BasePaymentTypeInformation $paymentTypeInformation);
} 