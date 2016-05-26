<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

// get extension confArr
$arrConfiguration = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['pbsurvey']);
// disable/enable adding of text (copy[*]) to text of copied records
$blnPrependAtCopy = $arrConfiguration['prependAtCopy'] ? 'LLL:EXT:lang/locallang_general.php:LGL.prependAtCopy' : ' ';

$TCA['tx_pbsurvey_item'] = array(
    'ctrl' => array(
        'title' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_item',
        'label' => 'question',
        'label_alt' => 'question_type',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'prependAtCopy' => $blnPrependAtCopy,
        'useColumnsForDefaultValues' => 'type',
        'transOrigPointerField' => 'l18n_parent',
        'transOrigDiffSourceField' => 'l18n_diffsource',
        'languageField' => 'sys_language_uid',
        'type' => 'question_type',
        'typeicon_column' => 'question_type',
        'typeicons' => array(
            '0' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY)
                . 'icons/icon_tx_pbsurvey_item.gif',
            '1' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY)
                . 'icons/icon_pbsurvey_item_1.gif',
            '2' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY)
                . 'icons/icon_pbsurvey_item_2.gif',
            '3' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY)
                . 'icons/icon_pbsurvey_item_3.gif',
            '4' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY)
                . 'icons/icon_pbsurvey_item_4.gif',
            '5' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY)
                . 'icons/icon_pbsurvey_item_5.gif',
            '6' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY)
                . 'icons/icon_pbsurvey_item_6.gif',
            '7' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY)
                . 'icons/icon_pbsurvey_item_7.gif',
            '8' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY)
                . 'icons/icon_pbsurvey_item_8.gif',
            '9' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY)
                . 'icons/icon_pbsurvey_item_9.gif',
            '10' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY)
                . 'icons/icon_pbsurvey_item_10.gif',
            '11' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY)
                . 'icons/icon_pbsurvey_item_11.gif',
            '12' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY)
                . 'icons/icon_pbsurvey_item_12.gif',
            '13' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY)
                . 'icons/icon_pbsurvey_item_13.gif',
            '14' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY)
                . 'icons/icon_pbsurvey_item_14.gif',
            '15' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY)
                . 'icons/icon_pbsurvey_item_15.gif',
            '16' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY)
                . 'icons/icon_pbsurvey_item_16.gif',
            '17' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY)
                . 'icons/icon_pbsurvey_item_17.gif',
            '18' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY)
                . 'icons/icon_pbsurvey_item_18.gif',
            '19' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY)
                . 'icons/icon_pbsurvey_item_19.gif',
            '20' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY)
                . 'icons/icon_pbsurvey_item_20.gif',
            '21' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY)
                . 'icons/icon_pbsurvey_item_21.gif',
            '22' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY)
                . 'icons/icon_pbsurvey_item_22.gif',
            '23' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY)
                . 'icons/icon_pbsurvey_item_23.gif',
            '24' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY)
                . 'icons/icon_pbsurvey_item_24.gif',
        ),
        'sortby' => 'sorting',
        'delete' => 'deleted',
        'enablecolumns' => array(
            'disabled' => 'hidden',
        ),
        'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'tca.php',
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY)
            . 'icons/icon_tx_pbsurvey_item.gif',
    ),
//	'feInterface' => array (
//		'fe_admin_fieldList' => 'hidden,question_type,question,question_alias,question_subtext,page_title,page_introduction,options_required,options_random,options_alignment,options_minimum_responses,options_maximum_responses,answers,answers_allow_additionional,answers_type_additional',
//	)
);

$TCA['tx_pbsurvey_results'] = array(
    'ctrl' => array(
        'title' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_results',
        'label' => 'uid',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'enablecolumns' => array(
            'disabled' => 'hidden',
        ),
        'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'tca.php',
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY)
            . 'icons/icon_tx_pbsurvey_results.gif',
    ),
);

$TCA['tx_pbsurvey_answers'] = array(
    'ctrl' => array(
        'title' => 'LLL:EXT:pbsurvey/lang/locallang_db.xml:tx_pbsurvey_answers',
        'label' => 'question',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'enablecolumns' => array(
            'disabled' => 'hidden',
        ),
        'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'tca.php',
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY)
            . 'icons/icon_tx_pbsurvey_results.gif',
    ),
);

// Exclude fields from displaying and add FlexForm content
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY . '_pi1'] = 'layout,select_key,pages,recursive';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY . '_pi1'] = 'pi_flexform';
// Add tablename to default list of allowed tables on pages. Otherwise only in SysFolders
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_pbsurvey_item');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_pbsurvey_results');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_pbsurvey_answers');
// Adds Questionaire to the list of plugins in content elements of type 'Insert plugin'
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(array(
    'LLL:EXT:pbsurvey/lang/locallang_db.xml:tt_content.list_type_pi1',
    $_EXTKEY . '_pi1'
), 'list_type');
// Adds an entry to the 'ds' array of the tt_content field 'pi_flexform'.
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('pbsurvey_pi1',
    'FILE:EXT:pbsurvey/flexform_ds.xml');
// initialize static extension templates
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'static/css/', 'default CSS-styles');
// initialize 'context sensitive help' (csh)
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_pbsurvey_item',
    'EXT:pbsurvey/csh/locallang_pbsurvey_item.xml');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_pbsurvey_results',
    'EXT:pbsurvey/csh/locallang_pbsurvey_results.xml');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_pbsurvey_answers',
    'EXT:pbsurvey/csh/locallang_pbsurvey_answers.xml');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('xEXT_pbsurvey',
    'EXT:pbsurvey/csh/locallang_manual.xml');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('_MOD_web_txpbsurveyM1',
    'EXT:pbsurvey/csh/locallang_mod1.xml');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('_MOD_web_txpbsurveyM1',
    'EXT:pbsurvey/csh/locallang_modfunc1.xml');

// sets the transformation mode for the RTE to "ts_css" if the extension css_styled_content is installed (default is: "ts")
if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('css_styled_content')) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('RTE.config.tx_pbsurvey_item.page_introduction.proc.overruleMode=ts_css');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('RTE.config.tx_pbsurvey_item.question_subtext.proc.overruleMode=ts_css');
}

if (TYPO3_MODE == 'BE') {
    $TBE_MODULES_EXT['xMOD_db_new_content_el']['addElClasses']['tx_pbsurvey_pi1_wizicon']
        = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY)
        . 'pi1/class.tx_pbsurvey_pi1_wizicon.php';
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModule('web', 'txpbsurveyM1', '',
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'mod1/');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::insertModuleFunction('web_txpbsurveyM1', 'tx_pbsurvey_modfunc1',
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY)
        . 'modfunc1/class.tx_pbsurvey_modfunc1.php', 'LLL:EXT:pbsurvey/lang/locallang_modfunc1.xml:moduleFunction');

    // Register conditions wizard
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModule('xMOD_txpbsurveyconditionswiz', '', '',
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('pbsurvey'), '/wizard2/');
    // Register answers wizard
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModule('xMOD_txpbsurveyanswerswiz', '', '',
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('pbsurvey'), '/wizard2/');
}
?>