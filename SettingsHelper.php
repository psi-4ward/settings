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
 
class SettingsHelper extends System
{


	public function alter_tl_settings_DCA(DataContainer $dc)
	{
		preg_match_all('~\{([^\}:]+):?[^\}]*\}~',$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'],$arrLabels);
		$arrLabels = $arrLabels[1];

		if($this->Input->get('legend') && in_array($this->Input->get('legend'),$arrLabels))
		{
			if(preg_match("~({{$this->Input->get('legend')}[^\;]+)~",$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'],$palette))
			{
				$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] = str_replace(':hide}','}',$palette[1]);
			}
		}
	}




	/**
	 * Return all modules except back end and front end as array
	 * @return array
	 */
	public function getModules()
	{
		$arrReturn = array();
		$arrModules = scan(TL_ROOT . '/system/modules');

		$arrInactiveModules = deserialize($GLOBALS['TL_CONFIG']['inactiveModules']);
		$blnCheckInactiveModules = is_array($arrInactiveModules);

		foreach ($arrModules as $strModule)
		{
			if (substr($strModule, 0, 1) == '.')
			{
				continue;
			}

			if ($strModule == 'backend' || $strModule == 'frontend' || !is_dir(TL_ROOT . '/system/modules/' . $strModule) || $strModule == 'settings')
			{
				continue;
			}

			if ($blnCheckInactiveModules && in_array($strModule, $arrInactiveModules))
			{
				$strFile = sprintf('%s/system/modules/%s/languages/%s/modules.php', TL_ROOT, $strModule, $GLOBALS['TL_LANGUAGE']);

				if (file_exists($strFile))
				{
					include($strFile);
				}
			}

			$arrReturn[$strModule] = '<span style="color:#b3b3b3">['. $strModule .']</span> ' . (is_array($GLOBALS['TL_LANG']['MOD'][$strModule]) ? $GLOBALS['TL_LANG']['MOD'][$strModule][0] : $GLOBALS['TL_LANG']['MOD'][$strModule]);
		}

		natcasesort($arrReturn);
		return $arrReturn;
	}
}
