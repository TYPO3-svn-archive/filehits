<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}




$TCA['tx_filehits_domain_model_filehit'] = array(
	'ctrl' => array(
		'title'						=> 'LLL:EXT:filehits/Resources/Private/Language/locallang_db.xml:tx_filehits_domain_model_filehit',
		'label'						=> 'file',
		'lastAccess'					=> 'lastAccess',
		'crdate'					=> 'crdate',
		'versioningWS'				=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid'					=> 't3_origuid',
		'languageField'				=> 'sys_language_uid',
		'transOrigPointerField'		=> 'l18n_parent',
		'transOrigDiffSourceField'	=> 'l18n_diffsource',
		'delete'					=> 'deleted',
		'readOnly'					=> TRUE,
		'rootLevel' 				=> -1,
		'enablecolumns'				=> array(
			'disabled'		=> 'hidden'
		),
		'dynamicConfigFile'			=> t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Filehit.php',
		'iconfile'					=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_filehits_domain_model_filehit.gif'
	)
);
?>