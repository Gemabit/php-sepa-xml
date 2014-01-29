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

namespace Gemabit\Sepa\ReversalFile;

use Gemabit\Sepa\DomBuilder\DomBuilderInterface;
use Gemabit\Sepa\OriginalGroupInformation;
use Gemabit\Sepa\OriginalPaymentInformation;
use Gemabit\Sepa\Exception\InvalidReversalFileConfiguration;

class DirectDebitReversalFile extends BaseReversalFile
{
    /**
     * @var OriginalGroupInformation $originalGroupInformation
     */
    protected $originalGroupInformation;

    /**
     * @var array<OriginalPaymentInformation> $originalPaymentInformation
     */
    protected $originalPaymentInformations;

    /**
     * @param OriginalGroupInformation $originalGroupInformation
     */
    public function setOriginalGroupInformation(OriginalGroupInformation $originalGroupInformation)
    {
        $this->originalGroupInformation = $originalGroupInformation;
    }

    /**
     * @return OriginalGroupInformation
     */
    public function getOriginalGroupInformation()
    {
        return $this->originalGroupInformation;
    }

    /**
     * @param OriginalPaymentInformation $originalPaymentInformation
     */
    public function addOriginalPaymentInformation(OriginalPaymentInformation $originalPaymentInformation)
    {
        $this->originalPaymentInformations[] = $originalPaymentInformation;
    }

    /**
     * @return array<OriginalPaymentInformation>
     */
    public function getOriginalPaymentInformations()
    {
        return $this->originalPaymentInformations;
    }

    /**
     * @param DomBuilderInterface $domBuilder
     */
    public function accept(DomBuilderInterface $domBuilder)
    {
        parent::accept($domBuilder);

        $this->originalGroupInformation->accept($domBuilder);

        foreach ($this->originalPaymentInformations as $originalPaymentInformation) {
            $originalPaymentInformation->accept($domBuilder);
        }
    }

    /**
     * Validate the reversalfile
     * @return mixed
     */
    public function validate()
    {
        if (count($this->originalPaymentInformations) === 0) {
            throw new InvalidReversalFileConfiguration('No paymentinformations available, add paymentInformation via addPaymentInformation()');
        }
    }
}