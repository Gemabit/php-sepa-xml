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

namespace Gemabit\Sepa\TransferFile;


use Digitick\Sepa\DomBuilder\DomBuilderInterface;
use Digitick\Sepa\GroupHeader;

class DirectDebitReversalTransferFile implements \Digitick\Sepa\TransferFile\TransferFileInterface{

    public function __construct(GroupHeader $groupHeader)
    {
        // TODO: Implement __construct() method.
    }

    /**
     * @return GroupHeader
     */
    public function getGroupHeader()
    {
        // TODO: Implement getGroupHeader() method.
    }

    /**
     * Validate the transferfile
     * @return mixed
     */
    public function validate()
    {
        // TODO: Implement validate() method.
    }

    public function accept(DomBuilderInterface $domBuilder)
    {
        // TODO: Implement accept() method.
    }
}