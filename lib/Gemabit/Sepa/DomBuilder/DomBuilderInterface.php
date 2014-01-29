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

use Gemabit\Sepa\GroupHeader;
use Gemabit\Sepa\OriginalGroupInformation;
use Gemabit\Sepa\OriginalPaymentInformation;
use Gemabit\Sepa\ReturnFile\ReturnFileInterface;

/**
 * Used to build the Dom-structure for the different types of SEPA files
 *
 * @package Gemabit\Sepa
 * @subpackage Gemabit\Sepa\DomBuilder
 */
interface DomBuilderInterface
{
    /**
     * Build the root of the document
     *
     * @param ReturnFileInterface|ReversalFileInterface $file
     * @return mixed
     */
    public function visitFile($file);

    /**
     * Add GroupHeader Information to the document
     *
     * @param GroupHeader $groupHeader
     * @return mixed
     */
    public function visitGroupHeader(GroupHeader $groupHeader);

    /**
     * Crawl OriginalGroupInformation
     *
     * @param OriginalGroupInformation $originalGroupInformation
     * @return mixed
     */
    public function visitOriginalGroupInformation(OriginalGroupInformation $originalGroupInformation);

    /**
     * Crawl OriginalPaymentInformation
     *
     * @param OriginalPaymentInformation $originalPaymentInformation
     * @return mixed
     */
    public function visitOriginalPaymentInformation(OriginalPaymentInformation $originalPaymentInformation);
}