<?php if(!defined('TL_ROOT')) {die('You cannot access this file directly!'); }

/**
 * @copyright 4ward.media 2012 <http://www.4wardmedia.de>
 * @author Christoph Wiechert <wio@psitrax.de>
 */
 

 /**
  * Table tl_registry
  */
$GLOBALS['TL_DCA']['tl_registry'] = array
(

 	// Config
 	'config' => array
 	(
 		'dataContainer'					=> 'Table',
 		'enableVersioning'				=> true,
 		'switchToEdit'					=> true,
 	),

 	// List
 	'list' => array
 	(
 		'sorting' => array
 		(
 			'mode'						=> 1,
 			'fields'					=> array('category'),
 			'flag'						=> 0,
 			'panelLayout'				=> 'filter;search,limit',
 		),
 		'label' => array
 		(
 			'fields'					=> array('name'),
 			'format'					=> '%s',
 //			'format'					=> '%s <span style="color:#b3b3b3; padding-left:3px;">[%s]</span>',
 			'label_callback'			=> array('tl_registry', 'generateLabel'),
 		),
 		'global_operations' => array
 		(
 			'all' => array
 			(
 				'label'					=> &$GLOBALS['TL_LANG']['MSC']['all'],
 				'href'					=> 'act=select',
 				'class'					=> 'header_edit_all',
 				'attributes'			=> 'onclick="Backend.getScrollOffset();" accesskey="e"'
 			),
 		),
 		'operations' => array
 		(
 			'edit' => array
 			(
 				'label'					=> &$GLOBALS['TL_LANG']['tl_registry']['edit'],
 				'href'					=> 'act=edit',
 				'icon'					=> 'edit.gif'
 			),
 			'copy' => array
 			(
 				'label'					=> &$GLOBALS['TL_LANG']['tl_registry']['copy'],
 				'href'					=> 'act=copy',
 				'icon'					=> 'copy.gif'
 			),
 			'delete' => array
 			(
 				'label'					=> &$GLOBALS['TL_LANG']['tl_registry']['delete'],
 				'href'					=> 'act=delete',
 				'icon'					=> 'delete.gif',
 				'attributes'			=> 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
 			),
 			'show' => array
 			(
 				'label'					=> &$GLOBALS['TL_LANG']['tl_registry']['show'],
 				'href'					=> 'act=show',
 				'icon'					=> 'show.gif'
 			),
 		)
 	),

 	// Palettes
 	'palettes' => array
 	(
		'__selector__'					=> array('useUserOverwrite','useGroupOverwrite','useHostOverwrite'),
 		'default'						=> '{name_legend},name,category;{config_legend},param,value;{user_legend},useUserOverwrite;{group_legend},useGroupOverwrite;{host_legend},useHostOverwrite',
 	),

	'subpalettes' => array
	(
		'useUserOverwrite'				=> 'userOverwrite,userValue',
		'useGroupOverwrite'				=> 'groupOverwrite,groupValue',
		'useHostOverwrite'				=> 'hostOverwrite,hostValue',
	),

 	// Fields
 	'fields' => array
 	(
 		'name' => array
 		(
 			'label'						=> &$GLOBALS['TL_LANG']['tl_registry']['name'],
 			'exclude'					=> true,
			'search'					=> true,
 			'inputType'					=> 'text',
 			'eval'						=> array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50'),
 		),
 		'category' => array
 		(
 			'label'						=> &$GLOBALS['TL_LANG']['tl_registry']['category'],
 			'exclude'					=> true,
			'search'					=> true,
			'filter'					=> true,
 			'inputType'					=> 'text',
 			'eval'						=> array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50'),
			'load_callback' 			=> array(array('tl_registry', 'checkCategory'))
 		),
 		'param' => array
 		(
 			'label'						=> &$GLOBALS['TL_LANG']['tl_registry']['param'],
 			'exclude'					=> true,
 			'inputType'					=> 'text',
 			'search'					=> true,
 			'eval'						=> array('mandatory'=>true, 'rgxp'=>'alnum', 'unique'=>true, 'spaceToUnderscore'=>true, 'maxlength'=>255, 'tl_class'=>''),
 		),
		'value' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_registry']['value'],
			'exclude'					=> true,
			'inputType'					=> 'textarea',
			'search'					=> true,
			'eval'						=> array('decodeEntities'=>true, 'style'=>'height:80px;', 'preserveTags'=>true),
		),

		'useUserOverwrite' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_registry']['useUserOverwrite'],
			'exclude'					=> true,
			'inputType'					=> 'checkbox',
			'filter'					=> true,
			'eval'						=> array('submitOnChange'=>true),
		),
		'userValue' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_registry']['userValue'],
			'exclude'					=> true,
			'inputType'					=> 'textarea',
			'search'					=> true,
			'eval'						=> array('decodeEntities'=>true, 'style'=>'height:80px;', 'preserveTags'=>true),
		),
		'userOverwrite' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_registry']['userOverwrite'],
			'exclude'					=> true,
			'inputType'					=> 'multiColumnWizard',
			'eval' => array
			(
				'flatArray' => true,
				'columnFields' => array
				(
					'user' => array
					(
						'label'			=> array(' '),
						'inputType'		=> 'select',
						'foreignKey'	=> 'tl_user.username',
						'eval'			=> array('chosen'=>true)
					)
				)
			)
		),


		'useGroupOverwrite' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_registry']['useGroupOverwrite'],
			'exclude'					=> true,
			'inputType'					=> 'checkbox',
			'filter'					=> true,
			'eval'						=> array('submitOnChange'=>true),
		),
		'groupValue' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_registry']['groupValue'],
			'exclude'					=> true,
			'inputType'					=> 'textarea',
			'search'					=> true,
			'eval'						=> array('decodeEntities'=>true, 'style'=>'height:80px;', 'preserveTags'=>true),
		),
		'groupOverwrite' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_registry']['groupOverwrite'],
			'exclude'					=> true,
			'inputType'					=> 'multiColumnWizard',
			'eval' => array
			(
				'flatArray' => true,
				'columnFields' => array
				(
					'user' => array
					(
						'label'			=> array(' '),
						'inputType'		=> 'select',
						'options_callback'	=> array('tl_registry','getGroups'),
						'eval'			=> array('chosen'=>true)
					)
				)
			)
		),

		'useHostOverwrite' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_registry']['useHostOverwrite'],
			'exclude'					=> true,
			'inputType'					=> 'checkbox',
			'filter'					=> true,
			'eval'						=> array('submitOnChange'=>true),
		),
		'hostValue' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_registry']['hostValue'],
			'exclude'					=> true,
			'inputType'					=> 'textarea',
			'search'					=> true,
			'eval'						=> array('decodeEntities'=>true, 'style'=>'height:80px;', 'preserveTags'=>true),
		),
		'hostOverwrite' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_registry']['hostOverwrite'],
			'exclude'					=> true,
			'inputType'					=> 'multiColumnWizard',
			'eval' => array
			(
				'flatArray' => true,
				'columnFields' => array
				(
					'user' => array
					(
						'label'			=> array(' '),
						'inputType'		=> 'text',
						'eval'			=> array()
					)
				)
			)
		),
 	)
);

class tl_registry extends System
{

	public function generateLabel($arrRow)
	{
		$strReturn = '<p style="margin-top:3px;"><span style="font-weight:bold;">'.$arrRow['name'].'</span><br>';
		$strReturn .= $arrRow['param'].'</p>';


		foreach(array('useUserOverwrite','useGroupOverwrite','useHostOverwrite') AS $v)
		{
			if($arrRow[$v])
			{
				$strReturn .= '<div style="font-size:7pt;">'.$GLOBALS['TL_LANG']['tl_registry'][$v][0].'</div>';
			}
		}


		return $strReturn;
	}


	/**
	 * Return all user_groups and add administator = "-1" as group
	 * @return array
	 */
	public function getGroups()
	{
		$this->import('Database');

		$objGroups = $this->Database->execute('SELECT id,name FROM tl_user_group');
		$arrGroups = array('-1'=>'Administrator');
		while($objGroups->next())
		{
			$arrGroups[$objGroups->id] = $objGroups->name;
		}
		return $arrGroups;
	}


	/**
	 * Automatically set the category if not set
	 * @param mixed
	 * @return string
	 */
	public function checkCategory($varValue)
	{
		// Do not change the value if it has been set already
		if (strlen($varValue) || $this->Input->post('FORM_SUBMIT') == 'tl_registry')
		{
			return $varValue;
		}

		$key = 'tl_registry';
		$filter = $this->Session->get('filter');

		// Return the current category
		if (strlen($filter[$key]['category']))
		{
			return $filter[$key]['category'];
		}

		return '';
	}
}