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

 /**
  * Fields
  */
$GLOBALS['TL_LANG']['tl_registry']['name']			          = array
(
	'Name',
	'Hier kann ein optionaler Name vergeben werden'
);
$GLOBALS['TL_LANG']['tl_registry']['category']		        = array
(
	'Kategorie',
	'Hier kann eine optionale Kategorie vergeben werden'
);
$GLOBALS['TL_LANG']['tl_registry']['param']			          = array
(
	'Identifikationsschlüssel',
	'Über diesen Schlüssel wird die Einstellung identifiziert.'
);
$GLOBALS['TL_LANG']['tl_registry']['value']			          = array
(
	'Wert',
	'Tragen Sie den Wert der Einstellung ein.'
);

$GLOBALS['TL_LANG']['tl_registry']['useUserOverwrite']		= array
(
	'Einstellungen für Benutzer überschreiben',
	'Über diese Option kann der Wert für bestimmte Benutzer festgelegt werden.'
);
$GLOBALS['TL_LANG']['tl_registry']['userOverwrite']			  = array
(
	'Benutzer',
	'Wählen Sie die Benutzer für diese Einstellung gilt.'
);
$GLOBALS['TL_LANG']['tl_registry']['userValue']				    = array
(
	'Wert',
	'Tragen Sie den Wert der Einstellung ein.'
);
$GLOBALS['TL_LANG']['tl_registry']['useGroupOverwrite']		= array
(
	'Einstellungen für Gruppen überschreiben',
	'Über diese Option kann der Wert für bestimmte Gruppen festgelegt werden.'
);
$GLOBALS['TL_LANG']['tl_registry']['groupOverwrite']		  = array
(
	'Gruppen',
	'Wählen Sie die Gruppen für diese Einstellung gilt.'
);
$GLOBALS['TL_LANG']['tl_registry']['groupValue']			    = array
(
	'Wert',
	'Tragen Sie den Wert der Einstellung ein.'
);
$GLOBALS['TL_LANG']['tl_registry']['useHostOverwrite']		= array
(
	'Einstellungen für Hosts überschreiben',
	'Über diese Option kann der Wert für bestimmte Hosts festgelegt werden.'
);
$GLOBALS['TL_LANG']['tl_registry']['hostValue']				    = array
(
	'Wert',
	'Tragen Sie den Wert der Einstellung ein.'
);
$GLOBALS['TL_LANG']['tl_registry']['hostOverwrite']			  = array
(
	'Hosts',
	'Tragen Sie die Hosts ein, für welche diese Einstellung gilt.'
);



 /**
  * Buttons
  */
$GLOBALS['TL_LANG']['tl_registry']['new']				          = array
(
	'Neue Einstellung',
	'Erstellen Sie eine neue Einstellung'
);
$GLOBALS['TL_LANG']['tl_registry']['edit']				        = array
(
	'Einstellung bearbeiten',
	'Einstellung ID %s bearbeiten'
);
$GLOBALS['TL_LANG']['tl_registry']['copy']				        = array
(
	'Einstellung kopieren',
	'Einstellung ID %s kopieren'
);
$GLOBALS['TL_LANG']['tl_registry']['delete']			        = array
(
	'Einstellung löschen',
	'Einstellung ID %s löschen'
);
$GLOBALS['TL_LANG']['tl_registry']['show']				        = array
(
	'Einstellungdetails',
	'Details der Einstellung ID %s anzeigen'
);


 /**
  * Legends
  */
$GLOBALS['TL_LANG']['tl_registry']['name_legend']		      = 'Bezeichnung / Kategorie';
$GLOBALS['TL_LANG']['tl_registry']['config_legend']		    = 'Allgemeine Einstellungen';
$GLOBALS['TL_LANG']['tl_registry']['user_legend']		      = 'Benutzerspezifische Einstellung';
$GLOBALS['TL_LANG']['tl_registry']['group_legend']		    = 'Gruppenspezifische Einstellung';
$GLOBALS['TL_LANG']['tl_registry']['host_legend']		      = 'Hostspezifische Einstellung';

