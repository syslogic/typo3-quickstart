<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TYPO3_CONF_VARS['SYS']['sitename'] = 'New TYPO3 site';

	// Default password is "joh316" :
$TYPO3_CONF_VARS['BE']['installToolPassword'] = 'bacb98acf97e0b6112b1d1b650b84971';

$TYPO3_CONF_VARS['EXT']['extList'] = 'info,perm,func,filelist,extbase,fluid,about,tsconfig_help,context_help,extra_page_cm_options,impexp,sys_note,tstemplate,tstemplate_ceditor,tstemplate_info,tstemplate_objbrowser,tstemplate_analyzer,func_wizards,wizard_crpages,wizard_sortpages,lowlevel,install,belog,beuser,aboutmodules,setup,taskcenter,info_pagetsconfig,viewpage,rtehtmlarea,css_styled_content,t3skin,t3editor,reports,felogin,form,introduction';

$typo_db_extTableDef_script = 'extTables.php';

/* Database Connection for Pagoda Box */
$typo_db_username = $_SERVER['DB1_USER'];
$typo_db_password = $_SERVER['DB1_PASS'];
$typo_db_host = $_SERVER['DB1_HOST'];
$typo_db_database = $_SERVER['DB1_NAME'];

## INSTALL SCRIPT EDIT POINT TOKEN - all lines after this points may be changed by the install script!
?>