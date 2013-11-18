<?php

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


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'ModuleSettings' => 'system/modules/settings/ModuleSettings.php',
	'Registry'       => 'system/modules/settings/Registry.php',
	'SettingsHelper' => 'system/modules/settings/SettingsHelper.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'be_settings' => 'system/modules/settings/templates',
));
