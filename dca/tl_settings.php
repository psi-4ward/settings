<?php if(!defined('TL_ROOT')) {die('You cannot access this file directly!'); }

/**
 * @copyright 4ward.media 2012 <http://www.4wardmedia.de>
 * @author Christoph Wiechert <wio@psitrax.de>
 */
 
$GLOBALS['TL_DCA']['tl_settings']['config']['onload_callback'] = array(array('SettingsHelper','alter_tl_settings_DCA'));

$GLOBALS['TL_DCA']['tl_settings']['fields']['inactiveModules']['options_callback'] = array('SettingsHelper','getModules');