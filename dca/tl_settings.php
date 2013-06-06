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
 
$GLOBALS['TL_DCA']['tl_settings']['config']['onload_callback'] = array
(
  array('SettingsHelper','alter_tl_settings_DCA')
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['inactiveModules']['options_callback'] = array
(
  'SettingsHelper',
  'getModules'
);
