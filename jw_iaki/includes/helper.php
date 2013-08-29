<?php
/**
 * @version		2.1
 * @package		IAKI - Import As K2 Image (K2 plugin)
 * @author    	JoomlaWorks - http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2013 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

class JWIakiHelper
{

	// Grab the first image in a string
	function getFirstImage($string)
	{
		// find images
		$regex = "#<img.+?>#s";
		if (preg_match_all($regex, $string, $matches, PREG_PATTERN_ORDER) > 0)
		{
			$img = array();
			// Entire <img> tag
			$img['tag'] = $matches[0][0];
			// Image src
			if (preg_match("#src=\".+?\"#s", $img['tag'], $imgSrc))
			{
				$img['src'] = str_replace('src="', '', $imgSrc[0]);
				$img['src'] = str_replace('"', '', $img['src']);
			}
			else
			{
				$img['src'] = false;
			}
			// Is this a real content image?
			if (preg_match("#\.(jpg|jpeg|png|gif|bmp)#s", strtolower($img['src']), $imgExt))
			{
				$img['ext'] = true;
			}
			else
			{
				$img['ext'] = false;
			}
			return $img;
		}
	}

}
