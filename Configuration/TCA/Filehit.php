<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_filehits_domain_model_filehit'] = array(
	'ctrl' => $TCA['tx_filehits_domain_model_filehit']['ctrl'],
	'interface' => array(
		'showRecordFieldList'	=> 'fe_user,file,last_access'
	),
	'types' => array(
		'1' => array('showitem'	=> 'fe_user,file,last_access')
	),
	'palettes' => array(
		'1' => array('showitem'	=> '')
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude'			=> 1,
			'label'				=> 'LLL:EXT:lang/locallang_general.php:LGL.language',
			'config'			=> array(
				'type'					=> 'select',
				'foreign_table'			=> 'sys_language',
				'foreign_table_where'	=> 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.php:LGL.default_value', 0)
				)
			)
		),
		'l18n_parent' => array(
			'displayCond'	=> 'FIELD:sys_language_uid:>:0',
			'exclude'		=> 1,
			'label'			=> 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
			'config'		=> array(
				'type'			=> 'select',
				'items'			=> array(
					array('', 0),
				),
				'foreign_table' => 'tx_filehits_domain_model_filehit',
				'foreign_table_where' => 'AND tx_filehits_domain_model_filehit.uid=###REC_FIELD_l18n_parent### AND tx_filehits_domain_model_filehit.sys_language_uid IN (-1,0)',
			)
		),
		'l18n_diffsource' => array(
			'config'		=>array(
				'type'		=>'passthrough'
			)
		),
		't3ver_label' => array(
			'displayCond'	=> 'FIELD:t3ver_label:REQ:true',
			'label'			=> 'LLL:EXT:lang/locallang_general.php:LGL.versionLabel',
			'config'		=> array(
				'type'		=>'none',
				'cols'		=> 27
			)
		),
		'pid' => array(
			'exclude'	=> 1,
			'label'		=> 'LLL:EXT:lang/locallang_general.xml:LGL.pid',
			'config'	=> array(
				'type' => 'input'
			)
		),
		'crdate' => array(
			'exclude'	=> 1,
			'label'		=> 'LLL:EXT:lang/locallang_general.xml:LGL.crdate',
			'config'	=> array(
				'type' => 'input',
				'eval' => 'datetime'
			)
		),
		'hidden' => array(
			'exclude'	=> 1,
			'label'		=> 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'	=> array(
				'type'	=> 'check'
			)
		),
		'fe_user' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:filehits/Resources/Private/Language/locallang_db.xml:tx_filehits_domain_model_filehit.fe_user',
			'config'  => array(
				'type' => 'select',
				'foreign_table' => 'fe_users',
				'maxitems' => 1,
				'items' => array(''),
			)
		),
		'file' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:filehits/Resources/Private/Language/locallang_db.xml:tx_filehits_domain_model_filehit.file',
			'config'	=> array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			)
		),
		'last_access' => array(
			'exclude'	=> 1,
			'label'		=> 'LLL:EXT:filehits/Resources/Private/Language/locallang_db.xml:tx_filehits_domain_model_filehit.last_access',
			'config'	=> array(
				'type' => 'input',
				'eval' => 'datetime'
			)
		),
	),
);
?>