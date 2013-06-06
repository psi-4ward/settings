<?php if(!defined('TL_ROOT')) { die('You cannot access this file directly!'); }

/**
 * Quickjump4ward
 *
 * @copyright  4ward.media 2012 <http://www.4wardmedia.de>
 * @author     Christoph Wiechert <christoph.wiechert@4wardmedia.de>
 * @package    settings4ward
 * @license    LGPL 
 * @link       https://github.com/psi-4ward/settings
 * @filesource
 */
 
// Hack to display the config overview-page
if(!isset($_GET['table']) || !empty($_GET['table'])<1) 
{
	$GLOBALS['BE_MOD']['system']['settings']['callback'] = 'ModuleSettings';
}

// registry
$GLOBALS['BE_MOD']['system']['settings']['tables'][]   = 'tl_registry';

$GLOBALS['SETTINGS']['system_settings']['registry']    = array
(
	'icon'		=> 'system/modules/settings/html/registry.png',
	'table'		=> 'tl_registry',
	// href 	=> 'contao/main.php?do=settings&AnythingWhatYourExtensionSouldDo
);
$GLOBALS['TL_HOOKS']['replaceInsertTags'][]            = array
(
  'Registry', 
  'replaceInsertTags'
);

/*
 * Settings Icons for legend
 */
$GLOBALS['SETTINGS4WARD']['sort'] = array
(
  'title_legend'		  => 'system_settings',
  'date_legend'		    => 'system_settings',
  'global_legend'		  => 'system_settings',
  'backend_legend'	  => 'be_settings',
  'frontend_legend'	  => 'fe_settings',
  'cache_legend'		  => 'file_settings',
  'privacy_legend'	  => 'sec_settings',
  'security_legend'	  => 'sec_settings',
  'files_legend'		  => 'file_settings',
  'uploads_legend'	  => 'file_settings',
  'search_legend'		  => 'fe_settings',
  'modules_legend'	  => 'mod_settings',
  'timeout_legend'	  => 'sec_settings',
  'chmod_legend'		  => 'sec_settings',
  'update_legend'		  => 'system_settings',
  'smtp_legend'		    => 'system_settings',
  'repository_legend'	=> 'mod_settings',
);

$GLOBALS['SETTINGS4WARD']['icon'] = array
(
  'title_legend'		  => 'system/modules/settings/html/icons/title_legend.png',
  'date_legend'		    => 'system/modules/settings/html/icons/date_legend.png',
  'global_legend'		  => 'system/modules/settings/html/icons/global_legend.png',
  'backend_legend'	  => 'system/modules/settings/html/icons/backend_legend.png',
  'frontend_legend'	  => 'system/modules/settings/html/icons/frontend_legend.png',
  'cache_legend'		  => 'system/modules/settings/html/icons/cache_legend.png',
  'privacy_legend'	  => 'system/modules/settings/html/icons/privacy_legend.png',
  'security_legend'	  => 'system/modules/settings/html/icons/security_legend.png',
  'files_legend'		  => 'system/modules/settings/html/icons/files_legend.png',
  'uploads_legend'	  => 'system/modules/settings/html/icons/uploads_legend.png',
  'search_legend'		  => 'system/modules/settings/html/icons/search_legend.png',
  'modules_legend'	  => 'system/modules/settings/html/icons/modules_legend.png',
  'timeout_legend'	  => 'system/modules/settings/html/icons/timeout_legend.png',
  'chmod_legend'		  => 'system/modules/settings/html/icons/chmod_legend.png',
  'update_legend'		  => 'system/modules/settings/html/icons/update_legend.png',
  'smtp_legend'		    => 'system/modules/settings/html/icons/smtp_legend.png',
  'repository_legend'	=> 'system/modules/settings/html/icons/repository_legend.png',
);
