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
 * Controller for the filehit object
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_Filehits_Controller_FilehitController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * @var Tx_Filehits_Domain_Repository_FilehitRepository
	 */
	protected $filehitRepository = NULL;

	/**
	 * Injects the filehit repository
	 *
	 * @param Tx_Filehits_Domain_Repository_FilehitRepository $repository repository to inject
	 *
	 * @return void
	 */
	public function injectFilehitRepository(Tx_Filehits_Domain_Repository_FilehitRepository $repository) {
		$this->filehitRepository = $repository;
	}


	/**
	 * Index action
	 *
	 * @return void
	 */
	public function indexAction() {
		$requestedFile = $_SERVER['REQUEST_URI'];
		if ($requestedFile[0] === '/') {
			$requestedFile = substr($requestedFile, 1);
		}

		$GLOBALS['TSFE']->fe_user = tslib_eidtools::initFeUser();

		if (!$GLOBALS['TSFE']->fe_user->user) {
			// TODO: Make the id configurable
			header('Location: /?id=78');
			return;
		}
		$currentUserUid = $GLOBALS['TSFE']->fe_user->user['uid'];

		if (!file_exists(PATH_site . $requestedFile) || !is_file(PATH_site . $requestedFile)) {
			throw new Exception('The requested file was not found on the server!');
		}

		/** @var $existingFilehit Tx_Filehits_Domain_Model_Filehit */
		$existingFilehit = $this->filehitRepository->findOneByFileAndUser($requestedFile, $currentUserUid);
		if ($existingFilehit !== NULL) {
			$existingFilehit->setLastAccess(time());
			$this->filehitRepository->update($existingFilehit);
		} else {
			/** @var $filehit Tx_Filehits_Domain_Model_Filehit */
			$filehit = t3lib_div::makeInstance('Tx_Filehits_Domain_Model_Filehit');
			$filehit->setFile($requestedFile);
			$filehit->setFeUser($currentUserUid);
			$filehit->setLastAccess(time());
			$this->filehitRepository->add($filehit);
		}

		/* @var $persistenceManager Tx_Extbase_Persistence_Manager */
		$persistenceManager = t3lib_div::makeInstance('Tx_Extbase_Persistence_Manager');
		$persistenceManager->persistAll();

		header('Content-Type: ' . $this->getMimeType(PATH_site . $requestedFile));
		header('Content-Length: ' . filesize(PATH_site . $requestedFile));
		readfile(PATH_site . $requestedFile);

		die();
	}

	/**
	 * Returns the mime type of given file
	 *
	 * @param $filepath full path of file
	 *
	 * @return string mime type
	 */
	protected function getMimeType($filepath) {
		$finfo = finfo_open(FILEINFO_MIME_TYPE);
		return finfo_file($finfo, $filepath);
	}
}
?>