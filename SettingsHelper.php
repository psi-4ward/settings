<?php if(!defined('TL_ROOT')) {die('You cannot access this file directly!');
}

/**
 * @copyright 4ward.media 2012 <http://www.4wardmedia.de>
 * @author Christoph Wiechert <wio@psitrax.de>
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
	
}