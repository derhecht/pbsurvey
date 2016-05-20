<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2005 Patrick Broens (patrick@patrickbroens.nl)
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

if (!isset($MCONF)) {
	require('conf.php');
}

$GLOBALS['LANG']->includeLLFile('EXT:pbsurvey/lang/locallang_mod1.xml');
$GLOBALS['BE_USER']->modAccess($MCONF,1);

use \TYPO3\CMS\Backend\Utility\BackendUtility;
use \TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Backend Module 'pbsurvey' extension.
 * The idea of this module is to be a host module for backend applications that wish to present information / analysis of results of the pbsurvey extension.
 *
 * @author Patrick Broens <patrick@patrickbroens.nl>
 * @package TYPO3
 * @subpackage pbsurvey
 */
class tx_pbsurvey_module1 extends \TYPO3\CMS\Backend\Module\BaseScriptClass {
	var $strExtKey;
	var $strItemsTable;
	var $arrSurveyItems = array();

    /**********************************
	 *
	 * Configuration functions
	 *
	 **********************************/

	/**
	 * Initialization of the class
	 *
	 * @return	void
	 */
	function init()	{
		global $BACK_PATH;
		parent::init();
		$this->strExtKey = 'tx_pbsurvey';
		$this->arrModParameters = GeneralUtility::_GP($this->strExtKey);
		$this->strResultsTable = $this->strExtKey . '_results';
		$this->strItemsTable = $this->strExtKey . '_item';
		$this->strAnswersTable = $this->strExtKey . '_answers';
		$this->strUserTable = 'fe_users';
		$this->readSurvey();
	}

    /**********************************
	 *
	 * General functions
	 *
	 **********************************/

	/**
	 * Main function of the module. Write the content to $this->content
	 *
	 * @return   void
	 */
	function main()	{
		global $BE_USER,$LANG,$BACK_PATH;
		$arrPageInfo = BackendUtility::readPageAccess($this->id,$this->perms_clause);
		$intAccess = is_array($arrPageInfo) ? 1 : 0;
		if (($this->id && $intAccess) || ($BE_USER->user["admin"] && !$this->id))	{
			$this->objDoc = GeneralUtility::makeInstance("TYPO3\\CMS\\Backend\\Template\\DocumentTemplate");
			$this->objDoc->backPath = $BACK_PATH;
			$this->objDoc->form='<form action="" method="POST">';
			$this->objDoc->JScode = $this->objDoc->wrapScriptTags('
				script_ended = 0;
				function jumpToUrl(URL)	{	//
					document.location = URL;
				}
			');
			$this->objDoc->postCode = $this->objDoc->wrapScriptTags('
					script_ended = 1;
					if (top.fsMod) top.fsMod.recentIds["web"] = '.intval($this->id).';
			');
			$strHeaderSection = $this->objDoc->getHeader(
				'pages',
				$arrPageInfo,
				$arrPageInfo['_thePath']
			) . '<br>' . $LANG->sL('LLL:EXT:lang/locallang_core.php:labels.path') . ': ' . GeneralUtility::fixed_lgd_cs($arrPageInfo['_thePath'], 50);
			$this->content.=$this->objDoc->startPage($LANG->getLL("title"));
			$this->content.=$this->objDoc->header($LANG->getLL("title"));
			$this->content.=$this->objDoc->spacer(5);
			$this->content.=$this->objDoc->section("",$this->objDoc->funcMenu($strHeaderSection,BackendUtility::getFuncMenu($this->id,"SET[function]",$this->MOD_SETTINGS["function"],$this->MOD_MENU["function"])));
			$this->content.=$this->objDoc->divider(5);
			if ($this->arrSurveyItems) {
				$this->extObjContent();
			} else {
				$this->content.=$this->sectionError();
			}
			if ($BE_USER->mayMakeShortcut())	{
				$this->content.=$this->objDoc->spacer(20).$this->objDoc->section("",$this->objDoc->makeShortcutIcon("id",implode(",",array_keys($this->MOD_MENU)),$this->MCONF["name"]));
			}
			$this->content.=$this->objDoc->spacer(10);
		} else {
			$this->objDoc = GeneralUtility::makeInstance('TYPO3\CMS\Backend\Template\DocumentTemplate');
			$this->objDoc->backPath = $BACK_PATH;
			$this->content.=$this->objDoc->startPage($LANG->getLL("title"));
			$this->content.=$this->objDoc->header($LANG->getLL("title"));
			$this->content.=$this->objDoc->spacer(5);
			$this->content.=$this->objDoc->spacer(10);
		}
	}

	/**
	 * Prints out the module HTML
	 *
	 * @return   void
	 */
	function printContent()	{
		$this->content.=$this->objDoc->endPage();
		echo $this->content;
	}

	/**
	 * Create array out of possible answers in backend answers field
	 *
	 * @param	string		Content of backend answers field
	 * @return	array		Converted answers information to array
	 */
	function answersArray($strInput) {
		$arrKeys = array('answer','points');
		$strLine=explode(chr(10),$strInput);
		foreach($strLine as $intKey => $strLineValue)	{
			$strValue = explode('|',$strLineValue);
			for ($intCounter=0;$intCounter<2;$intCounter++)	{
				$arrOutput[$intKey+1][$arrKeys[$intCounter]]=trim($strValue[$intCounter]);
			}
		}
		return $arrOutput;
	}

	/**********************************
	 *
	 * Rendering functions
	 *
	 **********************************/

	/**
	 * Build section to show error text if no questions are available on page
	 *
	 * @return	string	HTML containing the section
	 */
	function sectionError() {
		global $LANG;
		$strTemp = '<p><span class="typo3-red">'.$LANG->getLL('no_results').'</span></p>';
		$strOutput = $this->objDoc->section($LANG->getLL('error'),$strTemp,0,1);
		return $strOutput;
	}

    /**********************************
	 *
	 * Reading functions
	 *
	 **********************************/

	/**
	 * Read all questions in the selected page and filter unneccessary content
	 * Write content to $this->arrSurveyItems[]
	 *
	 * @return	void
	 */
	function readSurvey() {
		$arrSelectConf['selectFields'] = 'uid,question_type,question,question_alias,answers,rows,answers_allow_additional,images,beginning_number,ending_number';
    	$arrSelectConf['where'] = '1=1';
    	$arrSelectConf['where'] .= ' AND pid=' . intval($this->id);
		$arrSelectConf['where'] .= ' AND ' . $this->strItemsTable . '.sys_language_uid IN (0,-1)';
		$arrSelectConf['where'] .= ' AND ((question_type>=1 AND question_type<=16) OR question_type IN (23,24))';
		$arrSelectConf['where'] .= BackendUtility::BEenableFields($this->strItemsTable);
		$arrSelectConf['where'] .= BackendUtility::deleteClause($this->strItemsTable);
		$arrSelectConf['orderBy'] = 'sorting ASC';
		$dbRes = $GLOBALS['TYPO3_DB']->exec_SELECTquery($arrSelectConf['selectFields'],$this->strItemsTable,$arrSelectConf['where'],'',$arrSelectConf['orderBy'],'');
		while ($arrRow =$GLOBALS['TYPO3_DB']->sql_fetch_assoc($dbRes)){
			$arrRow = array_map('trim', $arrRow);
			if (in_array($arrRow['question_type'],array(1,2,3,6,7,8,23))) {
            	$arrRow['answers'] = $this->answersArray($arrRow['answers']);
			} else {
				unset($arrRow['answers']);
			}
            if (in_array($arrRow['question_type'],array(6,7,8,9,11,15,16))) {
            	$arrRow['rows'] = explode(chr(10),$arrRow['rows']);
				$arrRow['rows'] = array_map('trim', $arrRow['rows']);
            } else {
            	unset($arrRow['rows']);
            }
            if (!in_array($arrRow['question_type'],array(1,3))) {
            	unset($arrRow['answers_allow_additional']);
            }
			if ($arrRow['question_type'] == 24) {
				$arrRow['images'] = explode(',', $arrRow['images']);
			} else {
				unset(
					$arrRow['images'],
					$arrRow['beginning_number'],
					$arrRow['ending_number']
				);
			}
            $this->arrSurveyItems[$arrRow['uid']] = $arrRow;
		}
    }

    /**
	 * Count the results on this page
	 *
	 * @return	array		Numbers of finished and unfinished results
	 */
	function countResults() {
		$arrSelectConf['selectFields'] = '*';
		$arrSelectConf['where'] = '1=1';
    	$arrSelectConf['where'] .= ' AND pid=' . intval($this->id);
		$arrSelectConf['where'] .= BackendUtility::BEenableFields($this->strResultsTable);
		$arrSelectConf['where'] .= BackendUtility::deleteClause($this->strResultsTable);
		$dbRes=$GLOBALS['TYPO3_DB']->exec_SELECTquery($arrSelectConf['selectFields'],$this->strResultsTable,$arrSelectConf['where']);
		$arrOutput['all'] = $GLOBALS['TYPO3_DB']->sql_num_rows($dbRes);
		$arrSelectConf['where'] .= ' AND finished=1';
		$dbRes=$GLOBALS['TYPO3_DB']->exec_SELECTquery($arrSelectConf['selectFields'],$this->strResultsTable,$arrSelectConf['where']);
		$arrOutput['finished'] = $GLOBALS['TYPO3_DB']->sql_num_rows($dbRes);
		$arrOutput['unfinished'] = $arrOutput['all'] - $arrOutput['finished'];
		return $arrOutput;
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/pbsurvey/mod1/index.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/pbsurvey/mod1/index.php']);
}

$SOBE = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('tx_pbsurvey_module1');
$SOBE->init();
if (!empty($SOBE->include_once)) {
    foreach($SOBE->include_once as $INC_FILE)	include_once($INC_FILE);
}
$SOBE->checkExtObj();
if (!empty($SOBE->include_once)) {
    foreach($SOBE->include_once as $INC_FILE)	include_once($INC_FILE);
}
$SOBE->checkSubExtObj();
$SOBE->main();
$SOBE->printContent();
?>