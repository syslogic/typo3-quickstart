<?php
/*
	TYPO3 v4.7.5
	
	Default Config File for Pagoda Box
	Copyright 2012 by Martin Zeitler
	http://codefx.biz/contact
*/

if(!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

/* default site title */
$TYPO3_CONF_VARS['SYS']['sitename'] = 'Pagoda TYPO3 Quicklaunch';

/* the default install password is "joh316" */
$TYPO3_CONF_VARS['BE']['installToolPassword'] = 'bacb98acf97e0b6112b1d1b650b84971';

/* the base url - might require adjustment later on */
$TYPO3_CONF_VARS['FE']['defaultTypoScript_constants'] = '[GLOBAL]'.chr(10).'myBaseUrl = http://'.$_SERVER['APP_NAME'].'.pagodabox.com';

/* some typo3 extensions */
$TYPO3_CONF_VARS['EXT']['extList'] = 'info,perm,func,filelist,extbase,fluid,about,tsconfig_help,context_help,extra_page_cm_options,impexp,sys_note,tstemplate,tstemplate_ceditor,tstemplate_info,tstemplate_objbrowser,tstemplate_analyzer,func_wizards,wizard_crpages,wizard_sortpages,lowlevel,install,belog,beuser,aboutmodules,setup,taskcenter,info_pagetsconfig,viewpage,rtehtmlarea,css_styled_content,t3skin,t3editor,reports,felogin,form,introduction';

/* the data connection */
$typo_db_host = $_SERVER['DB1_HOST'];
$typo_db = $_SERVER['DB1_NAME'];
$typo_db_username = $_SERVER['DB1_USER'];
$typo_db_password = $_SERVER['DB1_PASS'];
$typo_db_extTableDef_script = 'extTables.php';

/* these could be predefined as well */
$TYPO3_CONF_VARS['BE']['disable_exec_function'] = '0'
$TYPO3_CONF_VARS['GFX']['gdlib_png'] = '0' 

## INSTALL SCRIPT EDIT POINT TOKEN - all lines after this points may be changed by the install script!
?>