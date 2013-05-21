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

		foreach($arrLabels as $k => $lbl)
		{
			$section = array_key_exists($lbl, $GLOBALS['SETTINGS4WARD']['sort']) ? $GLOBALS['SETTINGS4WARD']['sort'][$lbl] : 'more_settings';

			$arrSettings[$section][$k] = array
			(
				'label'		=> $GLOBALS['TL_LANG']['tl_settings'][$lbl],
				'href'		=> 'contao/main.php?do=settings&table=tl_settings&legend='.urlencode($lbl),
			);
      
			if(array_key_exists($lbl, $GLOBALS['SETTINGS4WARD']['icon']) && file_exists(TL_ROOT."/".$GLOBALS['SETTINGS4WARD']['icon'][$lbl]))
			{
				$arrSettings[$section][$k]['icon'] = $GLOBALS['SETTINGS4WARD']['icon'][$lbl];
			}
			else
			{
				$arrSettings[$section][$k]['icon'] = 'system/modules/settings/html/icons/standard.png';
			}
		}

		return $arrSettings;
	}

}
