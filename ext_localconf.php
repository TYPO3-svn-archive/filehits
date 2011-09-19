<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Pi1',
	array(
		'Filehit' => 'index',
	),
	array(
		'Filehit' => 'index',
	)
);


$TYPO3_CONF_VARS['FE']['eID_include']['filehits'] = 'EXT:filehits/Classes/Dispatcher.php';

?>