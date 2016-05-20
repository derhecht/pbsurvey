<?php
if (!defined ('TYPO3_MODE'))     die ('Access denied.');

	// get extension confArr
$arrConfiguration = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['pbsurvey']);
	// l10n_mode for text fields
$strl10nMode = $arrConfiguration['l10n_mode_prefixLangTitle']?'prefixLangTitle':'';
	// hide new localizations
$strHideNewLocalizations = ($arrConfiguration['hideNewLocalizations']?'mergeIfNotBlank':'');

$TCA['tx_pbsurvey_item'] = array (
    'ctrl' => $TCA['tx_pbsurvey_item']['ctrl'],
    'interface' => array (
        'showRecordFieldList' => '
        	hidden,
			question_type,
			question,
			question_alias,
			question_subtext,
			options_required,
			options_random,
			options_alignment,
			options_minimum_responses,
			options_maximum_responses,
			options_row_heading_width,
			rows,
			answers,
			answers_allow_additional,
			answers_text_additional,
			answers_type_additional,
			answers_none,
			textarea_width,
			textarea_height,
			selectbox_height,
			display_type,
			default_value_tf,
			default_value_yn,
			default_value_txt,
			default_date,
			default_value_num,
			beginning_number,
			ending_number,
			total_number,
			minimum_date,
			maximum_date,
			minimum_value,
			maximum_value,
			maximum_length,
			image,
			images,
			image_height,
			image_width,
			image_alignment,
			email,
			heading,
			html,
			message,
			conditions,
			styleclass'
    ),
    'feInterface' => $TCA['tx_pbsurvey_item']['feInterface'],
    'columns' => array (
        'hidden' => array (
        	'l10n_mode' => $strHideNewLocalizations,
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.php:LGL.hidden',
            'config' => array (
                'type' => 'check',
                'default' => '1'
            )
        ),
        'sys_language_uid' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
			'config' => array (
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages',-1),
					array('LLL:EXT:lang/locallang_general.php:LGL.default_value',0)
				)
			)
		),
		'l18n_parent' => array (
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
			'config' => array (
				'type' => 'select',
				'items' => array (
					array('', 0),
				),
				'foreign_table' => 'tx_pbsurvey_item',
				'foreign_table_where' => 'AND tx_pbsurvey_item.uid=###REC_FIELD_l18n_parent### AND tx_pbsurvey_item.sys_language_uid IN (-1,0)',
				'wizards' => array(
					'_PADDING' => 2,
					'_VERTICAL' => 1,

					'edit' => array(
							'type' => 'popup',
							'title' => 'edit default language version of this record ',
							'script' => 'wizard_edit.php',
							'popup_onlyOpenIfSelected' => 1,
							'icon' => 'edit2.gif',
							'JSopenParams' => 'height=600,width=700,status=0,menubar=0,scrollbars=1,resizable=1',
					),
				),
			)
		),
		'l18n_diffsource' => array(
			'config' => array(
				'type'=>'passthrough'
			)
		),
        'question_type' => array (
        	'displayCond' => 'FIELD:sys_language_uid:=:0',
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.question_type',
            'config' => array (
                'type' => 'select',
                'items' => array (
                    //array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.question_type.I.0', '0'),
                    array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.question_type.I.1', '1'),
                    array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.question_type.I.23', '23'),
                    array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.question_type.I.2', '2'),
                    array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.question_type.I.3', '3'),
                    array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.question_type.I.4', '4'),
                    array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.question_type.I.5', '5'),
					array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.question_type.I.24', '24'),
                    array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.question_type.I.6', '6'),
                    array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.question_type.I.7', '7'),
                    array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.question_type.I.8', '8'),
                    array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.question_type.I.9', '9'),
                    array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.question_type.I.10', '10'),
                    array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.question_type.I.11', '11'),
                    array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.question_type.I.12', '12'),
                    array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.question_type.I.13', '13'),
                    array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.question_type.I.14', '14'),
                    array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.question_type.I.15', '15'),
                    array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.question_type.I.16', '16'),
                    array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.question_type.I.17', '17'),
                    array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.question_type.I.18', '18'),
                    array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.question_type.I.19', '19'),
					array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.question_type.I.20', '20'),
					array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.question_type.I.21', '21'),
					array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.question_type.I.22', '22'),
					array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.question_type.I.99', '99'),
                ),
				'default' => '1',
                'size' => 1,
                'maxitems' => 1,
            )
        ),
        'question' => array (
        	'l10n_mode' => $strl10nMode,
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.question',
            'config' => array (
                'type' => 'input',
                'size' => '30',
                'eval' => 'required',
            )
        ),
        'question_alias' => array (
        	'l10n_mode' => 'exclude',
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.question_alias',
            'config' => array (
                'type' => 'input',
                'size' => '30',
            )
        ),
        'question_subtext' => array (
        	'l10n_mode' => $strl10nMode,
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.question_subtext',
            /*'config' => array (
                'type' => 'text',
                'cols' => '30',
                'rows' => '5',
            )*/
        	'config' => array (
				'type' => 'text',
				'cols' => '48',
				'rows' => '5',
				'wizards' => array(
					'_PADDING' => 4,
					'RTE' => array(
						'notNewRecords' => 1,
						'RTEonly' => 1,
						'type' => 'script',
						'title' => 'LLL:EXT:cms/locallang_ttc.php:bodytext.W.RTE',
						'icon' => 'wizard_rte2.gif',
						'script' => 'wizard_rte.php',
					),
				)
			)
        ),
		'page_title' => array (
			'l10n_mode' => $strl10nMode,
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.page_title',
            'config' => array (
                'type' => 'input',
                'size' => '30',
            )
        ),
		'page_introduction' => array (
			'l10n_mode' => $strl10nMode,
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.page_introduction',
        	'config' => array (
				'type' => 'text',
				'cols' => '48',
				'rows' => '5',
				'wizards' => array(
					'_PADDING' => 4,
					'RTE' => array(
						'notNewRecords' => 1,
						'RTEonly' => 1,
						'type' => 'script',
						'title' => 'LLL:EXT:cms/locallang_ttc.php:bodytext.W.RTE',
						'icon' => 'wizard_rte2.gif',
						'script' => 'wizard_rte.php',
					),
				)
			)
        ),
        'options_required' => array (
        	'l10n_mode' => 'exclude',
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.options_required',
            'config' => array (
                'type' => 'check',
            )
        ),
        'options_random' => array (
        	'l10n_mode' => 'exclude',
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.options_random',
            'config' => array (
                'type' => 'check',
            )
        ),
        'options_alignment' => array (
        	'l10n_mode' => 'exclude',
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.options_alignment',
            'config' => array (
                'type' => 'select',
                'items' => array (
                    array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.options_alignment.I.0', '0'),
                    array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.options_alignment.I.1', '1'),
                ),
                'size' => 1,
                'maxitems' => 1,
            )
        ),
        'options_minimum_responses' => array (
        	'l10n_mode' => 'exclude',
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.options_minimum_responses',
            'config' => array (
                'type' => 'input',
                'size' => '4',
                'eval' => 'int',
				'checkbox' => '0',
            )
        ),
        'options_maximum_responses' => array (
        	'l10n_mode' => 'exclude',
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.options_maximum_responses',
            'config' => array (
                'type' => 'input',
                'size' => '4',
                'eval' => 'int',
				'checkbox' => '0',
            )
        ),
		'options_row_heading_width' => array (
			'l10n_mode' => 'exclude',
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.options_row_heading_width',
            'config' => array (
                'type' => 'input',
                'size' => '4',
                'range' => array ('lower'=>1,'upper'=>1000),
                'eval' => 'int',
				'checkbox' => '0',
            )
        ),
		'rows' => array (
			'l10n_mode' => $strl10nMode,
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.rows',
            'config' => array (
                'type' => 'text',
                'cols' => '30',
                'rows' => '5',
                'eval' => 'required',
            )
        ),
        'answers' => array (
        	'l10n_mode' => $strl10nMode,
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.answers',
            'config' => array (
                'type' => 'text',
                'cols' => '30',
                'rows' => '5',
                'eval' => 'required',
                'wizards' => array(
                    '_PADDING' => 2,
                    'forms' => array(
                        'title' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.answers_wiz',
                        'type' => 'script',
                        'hideParent' => array(
	                		'type' => 'text',
	                		'rows' => '5',
	                	),
                        'notNewRecords' => 1,
                        'icon' => t3lib_extMgm::extRelPath('pbsurvey').'icons/icon_wizard.gif',
	                    'module' => array(
	                        'name' => 'wizard_pbsurvey_answers'
	                    )
                    ),
                ),
            )
        ),
		'answers_allow_additional' => array (
			'l10n_mode' => 'exclude',
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.answers_allow_additional',
            'config' => array (
                'type' => 'check',
            )
        ),
		'answers_text_additional' => array (
			'l10n_mode' => $strl10nMode,
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.answers_text_additional',
            'config' => array (
                'type' => 'input',
                'size' => '30',
            )
        ),
        'answers_type_additional' => array (
        	'l10n_mode' => 'exclude',
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.answers_type_additional',
            'config' => array (
                'type' => 'select',
                'items' => array (
                    array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.answers_type_additional.I.0', '0'),
                    array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.answers_type_additional.I.1', '1'),
                ),
                'size' => 1,
                'maxitems' => 1,
            )
        ),
        'answers_none' => array (
			'l10n_mode' => 'exclude',
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.answers_none',
            'config' => array (
                'type' => 'check',
        		'default' => '1',
            )
        ),
        'textarea_width' => array (
			'l10n_mode' => 'exclude',
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.textarea_width',
            'config' => array (
                'type' => 'input',
                'size' => '3',
                'eval' => 'int',
				'checkbox' => '0',
				'default' => '20',
            )
        ),
        'textarea_height' => array (
			'l10n_mode' => 'exclude',
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.textarea_height',
            'config' => array (
                'type' => 'input',
                'size' => '3',
                'eval' => 'int',
				'checkbox' => '0',
				'default' => '5',
            )
        ),
        'selectbox_height' => array (
			'l10n_mode' => 'exclude',
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.selectbox_height',
            'config' => array (
                'type' => 'input',
                'size' => '3',
                'eval' => 'int',
				'checkbox' => '0',
				'default' => '5',
            )
        ),
		'display_type' => array (
			'l10n_mode' => 'exclude',
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.display_type',
            'config' => array (
                'type' => 'select',
                'items' => array (
                    array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.display_type.I.0', '0'),
                    array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.display_type.I.1', '1'),
					array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.display_type.I.2', '2'),
                ),
                'size' => 1,
                'maxitems' => 1,
            )
        ),
		'default_value_tf' => array (
			'l10n_mode' => 'exclude',
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.default_value_tf',
            'config' => array (
                'type' => 'select',
                'items' => array (
                    array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.default_value_tf.I.0', '0'),
                    array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.default_value_tf.I.1', '2'),
					array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.default_value_tf.I.2', '1'),
                ),
                'size' => 1,
                'maxitems' => 1,
            )
        ),
		'default_value_yn' => array (
			'l10n_mode' => 'exclude',
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.default_value_yn',
            'config' => array (
                'type' => 'select',
                'items' => array (
                    array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.default_value_yn.I.0', '0'),
                    array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.default_value_yn.I.1', '2'),
					array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.default_value_yn.I.2', '1'),
                ),
                'size' => 1,
                'maxitems' => 1,
            )
        ),
        'negative_first' => array (
			'l10n_mode' => 'exclude',
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.negative_first',
            'config' => array (
                'type' => 'check',
            )
        ),
		'default_value_txt' => array (
			'l10n_mode' => $strl10nMode,
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.default_value_txt',
            'config' => array (
                'type' => 'input',
                'size' => '30',
            )
        ),
		'default_date' => array (
			'l10n_mode' => 'exclude',
            'exclude' => 1,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.default_date',
            'config' => array (
                'type' => 'input',
                'size' => '8',
                'max' => '20',
                'eval' => 'date',
                'checkbox' => '0',
                'default' => '0'
            )
        ),
		'default_value_num' => array (
			'l10n_mode' => 'exclude',
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.default_value_num',
            'config' => array (
                'type' => 'input',
                'size' => '8',
                'eval' => 'int',
				'checkbox' => '0',
            )
        ),
		'beginning_number' => array (
			'l10n_mode' => 'exclude',
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.beginning_number',
            'config' => array (
                'type' => 'input',
                'size' => '8',
                'eval' => 'int',
				'checkbox' => '0',
            )
        ),
		'ending_number' => array (
			'l10n_mode' => 'exclude',
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.ending_number',
            'config' => array (
                'type' => 'input',
                'size' => '8',
                'eval' => 'int',
				'checkbox' => '0',
            )
        ),
		'total_number' => array (
			'l10n_mode' => 'exclude',
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.total_number',
            'config' => array (
                'type' => 'input',
                'size' => '8',
                'eval' => 'int',
				'checkbox' => '0',
            )
        ),
		'minimum_date' => array (
			'l10n_mode' => 'exclude',
            'exclude' => 1,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.minimum_date',
            'config' => array (
                'type' => 'input',
                'size' => '8',
                'max' => '20',
                'eval' => 'date',
                'checkbox' => '0',
                'default' => '0'
            )
        ),
		'maximum_date' => array (
			'l10n_mode' => 'exclude',
            'exclude' => 1,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.maximum_date',
            'config' => array (
                'type' => 'input',
                'size' => '8',
                'max' => '20',
                'eval' => 'date',
                'checkbox' => '0',
                'default' => '0'
            )
        ),
		'minimum_value' => array (
			'l10n_mode' => 'exclude',
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.minimum_value',
            'config' => array (
                'type' => 'input',
                'size' => '8',
                'eval' => 'int',
				'checkbox' => '0',
            )
        ),
		'maximum_value' => array (
			'l10n_mode' => 'exclude',
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.maximum_value',
            'config' => array (
                'type' => 'input',
                'size' => '8',
                'eval' => 'int',
				'checkbox' => '0',
            )
        ),
		'maximum_length' => array (
			'l10n_mode' => 'exclude',
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.maximum_length',
            'config' => array (
                'type' => 'input',
                'size' => '8',
                'eval' => 'int',
				'checkbox' => '0',
            )
        ),
		'image' => array (
			'l10n_mode' => 'mergeIfNotBlank',
            'exclude' => 1,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.image',
            'config' => array (
                'type' => 'group',
                'internal_type' => 'file',
                'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
                'max_size' => 500,
                'uploadfolder' => 'uploads/tx_pbsurvey',
                'show_thumbs' => 1,
                'size' => 1,
                'minitems' => 0,
                'maxitems' => 1,
            )
        ),
		'images' => array (
			'l10n_mode' => 'mergeIfNotBlank',
			'exclude' => 1,
			'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.images',
			'config' => array (
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'max_size' => 500,
				'uploadfolder' => 'uploads/tx_pbsurvey',
				'show_thumbs' => 1,
				'size' => 10,
				'minitems' => 0,
				'maxitems' => 999,
			)
		),
		'image_height' => array (
			'l10n_mode' => 'exclude',
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.image_height',
            'config' => array (
                'type' => 'input',
                'size' => '3',
                'eval' => 'int',
				'checkbox' => '0',
            )
        ),
		'image_width' => array (
			'l10n_mode' => 'exclude',
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.image_width',
            'config' => array (
                'type' => 'input',
                'size' => '3',
                'eval' => 'int',
				'checkbox' => '0',
            )
        ),
		'image_alignment' => array (
			'l10n_mode' => 'exclude',
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.image_alignment',
            'config' => array (
                'type' => 'select',
                'items' => array (
                    array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.image_alignment.I.0', '0'),
                    array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.image_alignment.I.1', '1'),
					array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.image_alignment.I.2', '2'),
					array('LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.image_alignment.I.3', '3'),
                ),
                'size' => 1,
                'maxitems' => 1,
            )
        ),
		'email' => array (
			'l10n_mode' => 'exclude',
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.email',
            'config' => array (
                'type' => 'check',
            )
        ),
		'heading' => array (
			'l10n_mode' => $strl10nMode,
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.heading',
            'config' => array (
                'type' => 'input',
                'size' => '30',
            )
        ),
		'html' => array (
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.html',
            'config' => array (
                'type' => 'text',
                'cols' => '30',
                'rows' => '5',
            )
        ),
		'message' => array (
			'l10n_mode' => $strl10nMode,
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.message',
            'config' => array (
                'type' => 'text',
                'cols' => '30',
                'rows' => '5',
            )
        ),
		'conditions' => array (
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.conditions',
            'config' => array (
                'type' => 'text',
                'cols' => '30',
                'rows' => '5',
                'wizards' => array(
                    '_PADDING' => 2,
                    'forms' => array(
                        'title' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.conditions_wiz',
                        'type' => 'script',
                        'hideParent' => array(
	                		'type' => 'text',
	                		'rows' => '5',
	                	),
                        'notNewRecords' => 1,
                        'icon' => t3lib_extMgm::extRelPath('pbsurvey').'icons/icon_wizard.gif',
	                    'module' => array(
	                        'name' => 'wizard_pbsurvey_conditions'
	                    )
                    ),
                ),
            )
        ),
        'styleclass' => array (
        	'l10n_mode' => 'exclude',
            'exclude' => 1,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item.styleclass',
            'config' => array (
                'type' => 'input',
                'size' => '10',
        		'eval' => 'alphanum_x',
            )
        ),
    ),
    'types' => array (
		'1' => array('showitem' => 'sys_language_uid;;1;;,question_type;;;;1-1-1, question;;2;;1-1-1, question_subtext;;;richtext:rte_transform[flag=rte_enabled|mode=ts];, answers;;3;;1-1-1, answers_text_additional;;4;;, options_minimum_responses;;;;1-1-1, options_maximum_responses, styleclass'),
		'23' => array('showitem' => 'sys_language_uid;;1;;,question_type;;;;1-1-1, question;;2;;1-1-1, question_subtext;;;richtext:rte_transform[flag=rte_enabled|mode=ts];, answers;;10;;1-1-1, selectbox_height, options_minimum_responses;;;;1-1-1, options_maximum_responses, styleclass'),
		'2' => array('showitem' => 'sys_language_uid;;1;;,question_type;;;;1-1-1, question;;2;;1-1-1, question_subtext;;;richtext:rte_transform[flag=rte_enabled|mode=ts];, answers;;11;;1-1-1, styleclass'),
		'3' => array('showitem' => 'sys_language_uid;;1;;,question_type;;;;1-1-1, question;;2;;1-1-1, question_subtext;;;richtext:rte_transform[flag=rte_enabled|mode=ts];, answers;;3;;1-1-1, answers_text_additional;;4;;, styleclass'),
		'4' => array('showitem' => 'sys_language_uid;;1;;,question_type;;;;1-1-1, question;;2;;1-1-1, question_subtext;;;richtext:rte_transform[flag=rte_enabled|mode=ts];, default_value_tf;;9;;1-1-1, display_type, styleclass'),
		'5' => array('showitem' => 'sys_language_uid;;1;;,question_type;;;;1-1-1, question;;2;;1-1-1, question_subtext;;;richtext:rte_transform[flag=rte_enabled|mode=ts];, default_value_yn;;9;;1-1-1, display_type, styleclass'),
		'24' => array('showitem' => 'sys_language_uid;;1;;,question_type;;;;1-1-1, question;;2;;1-1-1, question_subtext;;;richtext:rte_transform[flag=rte_enabled|mode=ts];, images;;7;;1-1-1, beginning_number;;;;1-1-1, ending_number, styleclass'),
		'6' => array('showitem' => 'sys_language_uid;;1;;,question_type;;;;1-1-1, question;;2;;1-1-1, question_subtext;;;richtext:rte_transform[flag=rte_enabled|mode=ts];, rows;;;;1-1-1, answers;;;;1-1-1, styleclass'),
		'7' => array('showitem' => 'sys_language_uid;;1;;,question_type;;;;1-1-1, question;;2;;1-1-1, question_subtext;;;richtext:rte_transform[flag=rte_enabled|mode=ts];, rows;;;;1-1-1, answers;;;;1-1-1, styleclass'),
		'8' => array('showitem' => 'sys_language_uid;;1;;,question_type;;;;1-1-1, question;;2;;1-1-1, question_subtext;;;richtext:rte_transform[flag=rte_enabled|mode=ts];, rows;;;;1-1-1, answers;;;;1-1-1, styleclass'),
		'9' => array('showitem' => 'sys_language_uid;;1;;,question_type;;;;1-1-1, question;;2;;1-1-1, question_subtext;;;richtext:rte_transform[flag=rte_enabled|mode=ts];, rows;;;;1-1-1, beginning_number;;;;1-1-1, ending_number, styleclass'),
		'10' => array('showitem' => 'sys_language_uid;;1;;,question_type;;;;1-1-1, question;;2;;1-1-1, question_subtext;;;richtext:rte_transform[flag=rte_enabled|mode=ts];, default_value_txt;;;;1-1-1, styleclass'),
		'11' => array('showitem' => 'sys_language_uid;;1;;,question_type;;;;1-1-1, question;;2;;1-1-1, question_subtext;;;richtext:rte_transform[flag=rte_enabled|mode=ts];, rows;;10;;1-1-1, total_number;;;;1-1-1, styleclass'),
		'12' => array('showitem' => 'sys_language_uid;;1;;,question_type;;;;1-1-1, question;;2;;1-1-1, question_subtext;;;richtext:rte_transform[flag=rte_enabled|mode=ts];, default_date;;5;;1-1-1, styleclass'),
		'13' => array('showitem' => 'sys_language_uid;;1;;,question_type;;;;1-1-1, question;;2;;1-1-1, question_subtext;;;richtext:rte_transform[flag=rte_enabled|mode=ts];, default_value_num;;6;;1-1-1, styleclass'),
		'14' => array('showitem' => 'sys_language_uid;;1;;,question_type;;;;1-1-1, question;;2;;1-1-1, question_subtext;;;richtext:rte_transform[flag=rte_enabled|mode=ts];, default_value_txt;;;;1-1-1, email, maximum_length, styleclass'),
		'15' => array('showitem' => 'sys_language_uid;;1;;,question_type;;;;1-1-1, question;;2;;1-1-1, question_subtext;;;richtext:rte_transform[flag=rte_enabled|mode=ts];, rows;;;;1-1-1, options_minimum_responses;;;;1-1-1, options_maximum_responses, maximum_length, styleclass'),
		'16' => array('showitem' => 'sys_language_uid;;1;;,question_type;;;;1-1-1, question;;2;;1-1-1, question_subtext;;;richtext:rte_transform[flag=rte_enabled|mode=ts];, rows;;;;1-1-1, styleclass'),
		'17' => array('showitem' => 'sys_language_uid;;1;;,question_type;;;;1-1-1, heading;;;;1-1-1, styleclass'),
		'18' => array('showitem' => 'sys_language_uid;;1;;,question_type;;;;1-1-1, styleclass'),
		'19' => array('showitem' => 'sys_language_uid;;1;;,question_type;;;;1-1-1, html;;;;1-1-1, styleclass'),
		'20' => array('showitem' => 'sys_language_uid;;1;;,question_type;;;;1-1-1, image;;7;;1-1-1, styleclass'),
		'21' => array('showitem' => 'sys_language_uid;;1;;,question_type;;;;1-1-1, message;;;;1-1-1, styleclass'),
		'22' => array('showitem' => 'sys_language_uid;;1;;,question_type;;;;1-1-1, page_title;;;;1-1-1, page_introduction;;;richtext:rte_transform[flag=rte_enabled|mode=ts];, conditions;;;;1-1-1'),
    	'99' => array('showitem' => 'sys_language_uid;;1;;,question_type;;;;1-1-1'),
    ),
    'palettes' => array (
        '1' => array('showitem' => 'hidden,l18n_parent'),
        '2' => array('showitem' => 'options_required,question_alias'),
        '3' => array('showitem' => 'options_random,options_alignment'),
        '4' => array('showitem' => 'answers_allow_additional, answers_type_additional, textarea_width, textarea_height'),
        '5' => array('showitem' => 'minimum_date, maximum_date'),
        '6' => array('showitem' => 'minimum_value, maximum_value, maximum_length'),
        '7' => array('showitem' => 'image_height, image_width, image_alignment'),
        //'8' => array('showitem' => 'page_introduction;;;richtext:rte_transform[flag=rte_enabled|mode=ts];'),
    	'9' => array('showitem' => 'negative_first, answers_none'),
    	'10' => array('showitem' => 'options_random'),
    	'11' => array('showitem' => 'options_random, answers_none'),
    )
);

if ($arrConfiguration['answersEditable']) {
	unset($TCA['tx_pbsurvey_item']['columns']['answers']['config']['wizards']['forms']['hideParent']);
}

$TCA['tx_pbsurvey_results'] = array (
	'ctrl' => $TCA['tx_pbsurvey_results']['ctrl'],
        'interface' => array (
		'showRecordFieldList' => 'hidden,user,ip,finished,begintstamp,endtstamp,language_uid,answers'
	),
	'feInterface' => $TCA['tx_pbsurvey_results']['feInterface'],
	'columns' => array (
		'hidden' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.hidden',
			'config' => array (
				'type' => 'check',
				'default' => '0',
			)
		),
		'user' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_results.user',
			'config' => array (
				'type' => 'group',
				'internal_type' => 'db',
				'allowed' => 'fe_users',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			)
		),
		'ip' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_results.ip',
			'config' => array (
                'type' => 'input',
                'size' => '15',
                'max' => '15',
			)
		),
		'finished' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_results.finished',
			'config' => array (
				'type' => 'check',
				'default' => '0',
			)
		),
		'begintstamp' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_results.begintstamp',
			'config' => array (
                'type' => 'input',
                'size' => '8',
                'max' => '20',
                'eval' => 'datetime',
			)
		),
		'endtstamp' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_results.endtstamp',
			'config' => array (
                'type' => 'input',
                'size' => '8',
                'max' => '20',
                'eval' => 'datetime',
			)
		),
		'language_uid' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_results.language',
			'config' => array (
                'type' => 'input',
                'size' => '15',
                'max' => '15',
			)
		),
		'history' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_results.history',
			'config' => array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			),
		),
	),
	'types' => array (
		'0' => array('showitem' => 'hidden;;1;;1-1-1,user,ip,finished,begintstamp,endtstamp,language_uid,answers,history')
	),
	'palettes' => array (
		'1' => array('showitem' => '')
	)
);

$TCA['tx_pbsurvey_answers'] = array (
	'ctrl' => $TCA['tx_pbsurvey_answers']['ctrl'],
        'interface' => array (
		'showRecordFieldList' => 'hidden,result,question,row,col,answer'
	),
	'feInterface' => $TCA['tx_pbsurvey_answers']['feInterface'],
	'columns' => array (
		'hidden' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.hidden',
			'config' => array (
				'type' => 'check',
				'default' => '0',
			)
		),
		'result' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_answers.result',
			'config' => array (
				'type' => 'group',
				'internal_type' => 'db',
				'allowed' => 'tx_pbsurvey_results',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			)
		),
		'question' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_answers.question',
			'config' => array (
				'type' => 'group',
				'internal_type' => 'db',
				'allowed' => 'tx_pbsurvey_item',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			)
		),
		'row' => array (
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_answers.row',
            'config' => array (
                'type' => 'input',
                'size' => '3',
                'eval' => 'int',
				'checkbox' => '0',
			)
		),
		'col' => array (
            'exclude' => 0,
            'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_answers.column',
            'config' => array (
                'type' => 'input',
                'size' => '3',
                'eval' => 'int',
				'checkbox' => '0',
			)
		),
		'answer' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_answers.answer',
			'config' => array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			)
		),
	),
	'types' => array (
		'0' => array('showitem' => 'hidden;;1;;1-1-1,result,question,row,col,answer')
	),
	'palettes' => array (
		'1' => array('showitem' => '')
	)
);
?>
