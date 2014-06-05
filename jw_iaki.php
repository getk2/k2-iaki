<?php
/**
 * @version		2.1
 * @package		IAKI - Import As K2 Image (K2 plugin)
 * @author    	JoomlaWorks - http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2014 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// Load the K2 Plugin API
JLoader::register('K2Plugin', JPATH_ADMINISTRATOR.DS.'components'.DS.'com_k2'.DS.'lib'.DS.'k2plugin.php');

// Initiate class to hold plugin events
class plgK2Jw_iaki extends K2Plugin
{

	// Some params
	var $pluginName = 'jw_iaki';
	var $pluginNameHumanReadable = 'IAKI (Import As K2 Image)';

	function plgK2Jw_iaki(&$subject, $params)
	{
		parent::__construct($subject, $params);

		// Define the DS constant under Joomla! 3.0
		if (!defined('DS'))
		{
			define('DS', DIRECTORY_SEPARATOR);
		}
	}

	function onK2PrepareContent(&$item, &$params, $limitstart)
	{
		$mainframe = JFactory::getApplication();

		// Get the K2 plugin params (the stuff you see when you edit the plugin in the plugin manager)
		$plugin = JPluginHelper::getPlugin('k2', $this->pluginName);
		$pluginParams = new JRegistry($plugin->params);

		$limitK2ItemId = (int)$pluginParams->get('limitK2ItemId', 9999999);
		$sourceImageFolder = $pluginParams->get('sourceImageFolder');
		$destImageFolder = $pluginParams->get('destImageFolder');

		// Includes
		require_once (dirname(__FILE__).DS.$this->pluginName.DS.'includes'.DS.'helper.php');
		$JWIakiHelper = new JWIakiHelper;

		// Output
		if (isset($item->id) && $item->id <= $limitK2ItemId)
		{

			if (isset($item->text) && JString::trim($item->text) != '')
			{
				$text = $item->text;
			}
			elseif (isset($item->introtext) && JString::trim($item->introtext) != '')
			{
				$text = $item->introtext;
			}
			else
			{
				$text = '';
			}

			$getFirstImage = $JWIakiHelper->getFirstImage($text);

			// Replace the entire path if needed
			if ($sourceImageFolder && $destImageFolder)
			{
				$getFirstImageSrc = str_replace($sourceImageFolder, $destImageFolder, $getFirstImage['src']);
			}
			else
			{
				$getFirstImageSrc = $getFirstImage['src'];
			}

			if ($getFirstImageSrc && !(isset($item->imageXSmall) && $item->imageXSmall != ''))
			{
				// Assign image path to K2 image object
				$item->image = $item->imageXSmall = $item->imageSmall = $item->imageMedium = $item->imageLarge = $item->imageXLarge = $item->imageGeneric = $getFirstImageSrc;

				// Strip the content from the actual <img /> tag
				$item->text = str_replace($getFirstImage['tag'], '', $item->text);
			}
		}

	}

} // END CLASS
