<?php if(!defined('TL_ROOT')) {die('You cannot access this file directly!'); }

/**
 * @copyright 4ward.media 2012 <http://www.4wardmedia.de>
 * @author Christoph Wiechert <wio@psitrax.de>
 */
 
class Registry
{

	public static function get($param)
	{
		$db = Database::getInstance();

		$objErg = $db->prepare('SELECT * FROM tl_registry WHERE param=?')->execute($param);
		if(!$objErg->numRows)
		{
			return '';
		}

		$value = $objErg->value;


		list($userId,$userGroups) = self::getUserIdAndGroups();

		// special value for users
		if($objErg->useUserOverwrite && $userId)
		{
			$arrUsers = deserialize($objErg->userOverwrite,true);
			if(in_array($userId,$arrUsers))
			{
				$value = $objErg->userValue;
			}
		}

		// special value for groups
		if($objErg->useGroupOverwrite && is_array($userGroups) && !empty($userGroups))
		{
			$arrGroups = deserialize($objErg->groupOverwrite,true);
			$erg = array_intersect($userGroups,$arrGroups);
			if(count($erg))
			{
				$value = $objErg->groupValue;
			}
		}

		// special value for hosts
		if($objErg->useHostOverwrite)
		{
			$Environment = Environment::getInstance();

			$hosts = deserialize($objErg->hostOverwrite,true);
			foreach($hosts as $host)
			{
				if(stripos($Environment->host,$host) !== false)
				{
					$value = $objErg->hostValue;
				}
			}

		}

		return $value;
	}


	/**
	 * Replace insert tags
	 *
	 * @param $strTag
	 * @return bool|string
	 */
	public function replaceInsertTags($strTag)
	{
		list($tag,$val) = explode('::',$strTag);

		if($tag == 'registry')
		{
			return self::get($val);
		}

		return false;
	}
	

	/**
	 * Fetch UserId and UserGroups if theres a valid Backend-Login
	 *
	 * @return mixed array(userId,groups)
	 */
	public static function getUserIdAndGroups()
	{
		$strHash = Input::getInstance()->cookie('BE_USER_AUTH');
		$strIp = Environment::getInstance()->ip;

		// Check the cookie hash
		if ($strHash != sha1(session_id() . (!$GLOBALS['TL_CONFIG']['disableIpCheck'] ? $strIp : '') . 'BE_USER_AUTH'))
		{
			return false;
		}

		$objSession = Database::getInstance()->prepare("SELECT tl_session.*,tl_user.groups, tl_user.admin FROM tl_session
		 												LEFT JOIN tl_user ON (tl_user.id=tl_session.pid)
														WHERE tl_session.hash=? AND tl_session.name=?")
									 		 ->execute($strHash, 'BE_USER_AUTH');

		// Try to find the session in the database
		if ($objSession->numRows < 1)
		{
			return false;
		}

		$time = time();

		// Validate the session
		if ($objSession->sessionID != session_id() || (!$GLOBALS['TL_CONFIG']['disableIpCheck'] && $objSession->ip != $strIp)
			|| $objSession->hash != $strHash || ($objSession->tstamp + $GLOBALS['TL_CONFIG']['sessionTimeout']) < $time)
		{
			return false;
		}

		$arrGroups = deserialize($objSession->groups,true);

		if($objSession->admin == '1')
		{
			$arrGroups[] = '-1';
		}

		return(array($objSession->pid, $arrGroups));
	}
}