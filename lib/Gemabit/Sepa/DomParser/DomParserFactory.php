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

use Digitick\Sepa\Exception\InvalidArgumentException;

/**
 * Used to parse the Dom-structure for the Direct Debit Return File
 * 
 * Class DomParserFactory
 * @package Gemabit\Sepa
 * @subpackage Gemabit\Sepa\DomParser
 */
class DomParserFactory
{

    /**
     * @param $filepath
     *
     * @return array|CreditTransferRefundReturnDomParser
     * @throws \Digitick\Sepa\Exception\InvalidArgumentException
     */
    public static function createCreditTransferRefundReturnDomParser($filepath)
    {
    	$varType = gettype($filepath);
    	switch ($varType) {
    		case 'string':
    			return new CreditTransferRefundReturnDomParser($filepath);
    		case 'array':
    			$listDomParsers = array();
    			foreach ($filepath as $file) {
    				$listDomParsers[] = new CreditTransferRefundReturnDomParser($filepath);
    			}
    			return $listDomParsers;
    		default:
    			throw new InvalidArgumentException('Invalid filepath type ' . $varType . ', should be a string or an array.');
    	}
    }

    /**
     * @param $filepath
     *
     * @return array|CreditTransferReturnDomParser
     * @throws \Digitick\Sepa\Exception\InvalidArgumentException
     */
    public static function createCreditTransferReturnDomParser($filepath)
    {
        $varType = gettype($filepath);
        switch ($varType) {
            case 'string':
                return new CreditTransferReturnDomParser($filepath);
            case 'array':
                $listDomParsers = array();
                foreach ($filepath as $file) {
                    $listDomParsers[] = new CreditTransferReturnDomParser($filepath);
                }
                return $listDomParsers;
            default:
                throw new InvalidArgumentException('Invalid filepath type ' . $varType . ', should be a string or an array.');
        }
    }

    /**
     * @param $filepath
     *
     * @return array|DirectDebitReturnDomParser
     * @throws \Digitick\Sepa\Exception\InvalidArgumentException
     */
    public static function createDirectDebitReturnFile($filepath)
    {
        $varType = gettype($filepath);
        switch ($varType) {
            case 'string':
                return new DirectDebitReturnDomParser($filepath);
            case 'array':
                $listDomParsers = array();
                foreach ($filepath as $file) {
                    $listDomParsers[] = new DirectDebitReturnDomParser($filepath);
                }
                return $listDomParsers;
            default:
                throw new InvalidArgumentException('Invalid filepath type ' . $varType . ', should be a string or an array.');
        }
    }

    /**
     * @param $filepath
     *
     * @return array|DirectDebitRefundReturnDomParser
     * @throws \Digitick\Sepa\Exception\InvalidArgumentException
     */
    public static function createDirectDebitRefundReturnFile($filepath)
    {
        $varType = gettype($filepath);
        switch ($varType) {
            case 'string':
                return new DirectDebitRefundReturnDomParser($filepath);
            case 'array':
                $listDomParsers = array();
                foreach ($filepath as $file) {
                    $listDomParsers[] = new DirectDebitRefundReturnDomParser($filepath);
                }
                return $listDomParsers;
            default:
                throw new InvalidArgumentException('Invalid filepath type ' . $varType . ', should be a string or an array.');
        }
    }
}
