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

use Gemabit\Sepa\GroupHeader;
use Gemabit\Sepa\DomBuilder\DomBuilderInterface;

abstract class BaseReversalFile implements ReversalFileInterface
{
    /**
     * @var GroupHeader
     */
    protected $groupHeader;


    /**
     * @param GroupHeader $groupHeader
     */
    public function __construct(GroupHeader $groupHeader)
    {
        $this->groupHeader = $groupHeader;
    }

    /**
     * @return GroupHeader
     */
    public function getGroupHeader()
    {
        return $this->groupHeader;
    }

    public function accept(DomBuilderInterface $domBuilder)
    {
        $this->validate();
        $domBuilder->visitFile($this);
        $this->groupHeader->accept($domBuilder);
    }
}