<?php if(!defined('TL_ROOT')) {die('You cannot access this file directly!');
}

/**
 * @copyright 4ward.media 2012 <http://www.4wardmedia.de>
 * @author Christoph Wiechert <wio@psitrax.de>
 */
 
class ModuleSettings extends BackendModule
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'be_settings';


	/**
	 * Generate the module
	 * @throws Exception
	 */
	protected function compile()
	{
		$this->loadLanguageFile('tl_settings');
		$this->loadLanguageFile('settings');

		$this->Template->content = '';
		$this->Template->href = $this->getReferer(true);
		$this->Template->title = specialchars($GLOBALS['TL_LANG']['MSC']['backBT']);
		$this->Template->button = $GLOBALS['TL_LANG']['MSC']['backBT'];

		foreach($GLOBALS['SETTINGS'] as $fieldset => $arrItems)
		{
			foreach($arrItems as $k => $item)
			{
				$GLOBALS['SETTINGS'][$fieldset][$k]['label'] = $GLOBALS['TL_LANG']['settings'][$k];

				if(file_exists(TL_ROOT.$item['icon']))
				{
					$GLOBALS['SETTINGS'][$fieldset][$k]['icon'] = 'system/modules/settings/html/icons/standard.png';
				}

				if(empty($item['href']))
				{
					$GLOBALS['SETTINGS'][$fieldset][$k]['href'] = 'contao/main.php?do=settings&table='.$item['table'];
				}
			}
		}

		$arrSettings = $this->compileContaoSettings($GLOBALS['SETTINGS']);

		foreach($arrSettings as $k => $v)
		{
			asort($arrSettings[$k]);
		}
		ksort($arrSettings,SORT_STRING);

		$this->Template->arrSettings = $arrSettings;

	}


	public function compileContaoSettings($arrSettings)
	{
		 preg_match_all('~\{([^\}:]+):?[^\}]*\}~',$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'],$arrLabels);
		$arrLabels = $arrLabels[1];

		$arrSections = array
		(
			'title_legend'		=> 'system_settings',
			'date_legend'		=> 'system_settings',
			'global_legend'		=> 'system_settings',
			'backend_legend'	=> 'be_settings',
			'frontend_legend'	=> 'fe_settings',
			'cache_legend'		=> 'file_settings',
			'privacy_legend'	=> 'sec_settings',
			'security_legend'	=> 'sec_settings',
			'files_legend'		=> 'file_settings',
			'uploads_legend'	=> 'file_settings',
			'search_legend'		=> 'fe_settings',
			'modules_legend'	=> 'mod_settings',
			'timeout_legend'	=> 'sec_settings',
			'chmod_legend'		=> 'sec_settings',
			'update_legend'		=> 'system_settings',
			'smtp_legend'		=> 'system_settings',
			'repository_legend'	=> 'mod_settings',
		);

		foreach($arrLabels as $k => $lbl)
		{
			$section = array_key_exists($lbl, $arrSections) ? $arrSections[$lbl] : 'more_settings';

			$arrSettings[$section][$k] = array
			(
				'label'		=> $GLOBALS['TL_LANG']['tl_settings'][$lbl],
				'href'		=> 'contao/main.php?do=settings&table=tl_settings&legend='.urlencode($lbl),
			);
			if(file_exists(TL_ROOT.'/system/modules/settings/html/icons/'.$lbl.'.png'))
			{
				$arrSettings[$section][$k]['icon'] = 'system/modules/settings/html/icons/'.$lbl.'.png';
			}
			else
			{
				$arrSettings[$section][$k]['icon'] = 'system/modules/settings/html/icons/standard.png';
			}
		}

		require_once('ChromePhp.php'); \ChromePhp::log($arrSettings);
		return $arrSettings;


	}

}