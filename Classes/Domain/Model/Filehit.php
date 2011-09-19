<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011 Armin Ruediger Vieweg <info@professorweb.de>
*
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * The filehit model
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_Filehits_Domain_Model_Filehit extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * full path to file
	 * @var string
	 */
	protected $file;

	/**
	 * frontend user uid
	 * @var integer
	 */
	protected $feUser;

	/**
	 * creation date of entry
	 * @var integer
	 */
	protected $crdate;

	/**
	 * timestamp of entry
	 * @var integer
	 */
	protected $lastAccess;

	/**
	 * @return string
	 */
	public function getFile() {
		return $this->file;
	}

	/**
	 * @param $file
	 * @return void
	 */
	public function setFile($file) {
		$this->file = $file;
	}

	/**
	 * @return integer
	 */
	public function getFeUser() {
		return $this->feUser;
	}

	/**
	 * @param integer $feUser
	 * @return void
	 */
	public function setFeUser($feUser) {
		$this->feUser = $feUser;
	}

	/**
	 * @return int
	 */
	public function getCrdate() {
		return $this->crdate;
	}

	/**
	 * @param $crdate
	 * @return void
	 */
	public function setCrdate($crdate) {
		$this->crdate = $crdate;
	}

	/**
	 * @return integer
	 */
	public function getLastAccess() {
		return $this->lastAccess;
	}

	/**
	 * @param integer $tstamp
	 */
	public function setLastAccess($tstamp) {
		$this->lastAccess = $tstamp;
	}
}
?>