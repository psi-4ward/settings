<?php if(!defined('TL_ROOT')) {die('You cannot access this file directly!');
}

/**
 * @copyright 4ward.media 2012 <http://www.4wardmedia.de>
 * @author Christoph Wiechert <wio@psitrax.de>
 */
 
// Hack to display the config overview-page
if(!isset($_GET['table']) || !empty($_GET['table'])<1) {
	$GLOBALS['BE_MOD']['system']['settings']['callback'] = 'ModuleSettings';
}

// registry
$GLOBALS['BE_MOD']['system']['settings']['tables'][] = 'tl_registry';
$GLOBALS['SETTINGS']['system_settings']['registry'] = array
(
	'icon'		=> 'system/modules/settings/html/registry.png',
	'table'		=> 'tl_registry',
	// href 	=> 'contao/main.php?do=settings&AnythingWhatYourExtensionSouldDo
);
$GLOBALS['TL_HOOKS']['replaceInsertTags'][] = array('Registry', 'replaceInsertTags');