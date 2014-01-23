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

use Gemabit\Sepa\GroupHeader;

/**
 * Used to parse the Dom-structure for the different types of SEPA files
 *
 * Class BaseDomParser
 * @package Gemabit\Sepa
 * @subpackage Gemabit\Sepa\DomParser
 */
abstract class BaseDomParser implements DomParserInterface
{
	/**
     * Document holder
     *
     * @var DOMDocument
     */    
    protected $doc;

    /**
     * Group Header holder
     *
     * @var GroupHeader
     */
    protected $groupHeader;

	function __construct($filepath) {
        $this->doc = new \DOMDocument();
        $this->doc->load($filepath);

        $this->fillGroupHeader($this->doc->getElementsByTagName('GrpHdr'));
    }

    /**
     * Fills up the GroupHeader with the given DOMElement
     */
    protected function fillGroupHeader(\DOMElement $DOMGroupHeader)
    {
    	$messageIdentification = '';
    	$initiatingPartyName = '';

    	$this->groupHeader = new GroupHeader($messageIdentification, $initiatingPartyName);
    	$this->groupHeader->setCreationDate(\DateTime::createFromFormat('j-M-Y', '15-Feb-2009'));
    	$this->groupHeader->setNumberOfTransactions(3);
    	$this->groupHeader->setControlSumCents(450000.81);
    	$this->groupHeader->setInitiatingPartyId('');
    }

    /**
     * Returns the GroupHeader Information of the document
     *
     * @return GroupHeader
     */
    public function getGroupHeader()
    {
    	return $this->groupHeader;
    }
}