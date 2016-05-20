<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "pbsurvey".
 *
 * Auto generated 21-11-2013 15:05
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Questionaire',
	'description' => 'Questionaire is an extension to take surveys from the visitors of your website. The results can be exported to a csv-file to analyze in Microsoft Excel or the statistical program SPSS or it\'s open source concurrent PSPP.',
	'category' => 'plugin',
	'shy' => 0,
	'version' => '1.6.0',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => 'wizard,wizard2,mod1',
	'state' => 'stable',
	'uploadfolder' => 1,
	'createDirs' => '',
	'modify_tables' => '',
	'clearcacheonload' => 0,
	'lockType' => '',
	'author' => 'Patrick Broens',
	'author_email' => 'patrick@patrickbroens.nl',
	'author_company' => '',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' =>
	array (
		'depends' =>
		array (
			'cms' => '',
			'php' => '5.2.0-5.5.99',
			'typo3' => '6.0.0-6.2.99',
		),
		'conflicts' =>
		array (
		),
		'suggests' =>
		array (
		),
	)
);

?>