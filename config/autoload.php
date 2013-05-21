<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @package Settings
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
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
