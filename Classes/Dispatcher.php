<?php
require_once(PATH_t3lib.'class.t3lib_page.php');
$GLOBALS['TSFE'] = t3lib_div::makeInstance('tslib_fe', $GLOBALS['TYPO3_CONF_VARS'], 0, 0);
$GLOBALS['TSFE']->sys_page = t3lib_div::makeInstance('t3lib_pageSelect');

/**
 * Initialized Extbase and Fluid
 * in eID context
 */
$configuration = array(
	'pluginName' => 'Pi1',
	'extensionName' => 'Filehits',
	'controller' => 'Filehit',
	'action' => 'index',
	'mvc' => array( 'requestHandlers' => array('Tx_Extbase_MVC_Web_FrontendRequestHandler'=>'Tx_Extbase_MVC_Web_FrontendRequestHandler')),
	'settings' => array()
);

$_POST['tx_filehits_pi1']['action'] = 'index';

$bootstrap = new Tx_Extbase_Core_Bootstrap();
$bootstrap->cObj = t3lib_div::makeInstance('tslib_cObj');

$extensionOutput = $bootstrap->run('', $configuration);

echo $extensionOutput;
die();
?>