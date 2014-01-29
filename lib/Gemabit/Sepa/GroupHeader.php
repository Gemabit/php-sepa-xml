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

namespace Gemabit\Sepa;

class GroupHeader extends \Digitick\Sepa\GroupHeader
{

    /**
     * @var string
     */
    protected $privateIdentification;

    /**
     * @return \DateTime
     */
    public function setCreationDateTime(\DateTime $creationDateTime)
    {
        $this->creationDateTime = $creationDateTime;
    }

    /**
     * @param bool $groupReversal
     */
    public function setGroupReversal($groupReversal)
    {
        $this->groupReversal = $groupReversal;
    }

    /**
     * @return bool
     */
    public function isGroupReversal()
    {
        if (!isset($this->groupReversal)) {
            $this->groupReversal = false;
        }

        return $this->groupReversal;
    }

    /**
     * @param string $privateIdentification
     */
    public function setPrivateIdentification($privateIdentification)
    {
        $this->privateIdentification = $privateIdentification;
    }

    /**
     * @return string
     */
    public function getPrivateIdentification()
    {
        return $this->privateIdentification;
    }
}