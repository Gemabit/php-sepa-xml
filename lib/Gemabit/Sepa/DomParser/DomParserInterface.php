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

use Digitick\Sepa\GroupHeader;
use Digitick\Sepa\PaymentInformation;
use Gemabit\Sepa\ReturnFile\ReturnFileInterface;
use Digitick\Sepa\TransferInformation\TransferInformationInterface;

/**
 * Used to parse the Dom-structure for the different types of SEPA files
 *
 * Class DomParserInterface
 * @package Gemabit\Sepa
 * @subpackage Gemabit\Sepa\DomParser
 */
interface DomParserInterface
{
    /**
     * Returns the GroupHeader Information of the document
     *
     * @return GroupHeader
     */
    public function getGroupHeader();

    /**
     * Returns the Original Group Information
     *
     * @return OriginalGroupInformation
     */
    public function getOriginalGroupInformation();

    /**
     * Returns the Original Payment Information
     *
     * @return OriginalPaymentInformation
     */
    public function getOriginalPaymentInformation();

} 