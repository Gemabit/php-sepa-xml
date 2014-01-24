<?php
/**
 * Created by PhpStorm.
 * User: rlopes
 * Date: 24/01/14
 * Time: 12:27
 */

namespace Gemabit\Sepa\TransactionInformation\PaymentTypeInformation;


abstract class BasePaymentTypeInformation
{
    /**
     * @var string Reason ISO Code i.e "SCOR"
     */
    protected $categoryPurposeCode;

    /**
     * @param string $categoryPurposeCode
     */
    public function setCategoryPurposeCode($categoryPurposeCode)
    {
        $this->categoryPurposeCode = $categoryPurposeCode;
    }

    /**
     * @return string
     */
    public function getCategoryPurposeCode()
    {
        return $this->categoryPurposeCode;
    }
}