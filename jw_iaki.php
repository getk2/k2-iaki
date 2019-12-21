<?php
/**
 * @version     2.2
 * @package     IAKI - Import As K2 Image (K2 plugin)
 * @author      JoomlaWorks - https://www.joomlaworks.net
 * @copyright   Copyright (c) 2006 - 2019 JoomlaWorks Ltd. All rights reserved.
 * @license     GNU/GPL license: https://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// Load the K2 Plugin API
JLoader::register('K2Plugin', JPATH_ADMINISTRATOR.'/components/com_k2/lib/k2plugin.php');

// Initiate class to hold plugin events
class plgK2Jw_iaki extends K2Plugin
{
    public $pluginName = 'jw_iaki';
    public $pluginNameHumanReadable = 'IAKI (Import As K2 Image)';

    public function __construct(&$subject, $params)
    {
        parent::__construct($subject, $params);
    }

    public function onK2PrepareContent(&$item, &$params, $limitstart)
    {
        // Get the K2 plugin params (the stuff you see when you edit the plugin in the plugin manager)
        $plugin = JPluginHelper::getPlugin('k2', $this->pluginName);
        $pluginParams = new JRegistry($plugin->params);

        $limitK2ItemId = (int) $pluginParams->get('limitK2ItemId');
        $sourceImageFolder = $pluginParams->get('sourceImageFolder');
        $destImageFolder = $pluginParams->get('destImageFolder');

        // Execute up to a certain item ID
        if ($limitK2ItemId) {
            if (isset($item->id) && $item->id > $limitK2ItemId) {
                return;
            }
        }

        // Output
        if (isset($item->id)) {
            if (isset($item->text) && trim($item->text) != '') {
                $text = $item->text;
            } elseif (isset($item->introtext) && trim($item->introtext) != '') {
                $text = $item->introtext;
            } else {
                $text = '';
            }

            $getFirstImage = $this->getFirstImage($text);

            // Replace the entire path if needed
            if ($sourceImageFolder && $destImageFolder) {
                $getFirstImageSrc = str_replace($sourceImageFolder, $destImageFolder, $getFirstImage['src']);
            } else {
                $getFirstImageSrc = $getFirstImage['src'];
            }

            if ($getFirstImageSrc && !(isset($item->imageXSmall) && $item->imageXSmall != '')) {
                // Assign image path to K2 image object
                $item->image = $item->imageXSmall = $item->imageSmall = $item->imageMedium = $item->imageLarge = $item->imageXLarge = $item->imageGeneric = $getFirstImageSrc;

                // Strip the content from the actual <img /> tag
                $item->text = str_replace($getFirstImage['tag'], '', $item->text);
            }
        }
    }

    // Grab the first image in a string
    private function getFirstImage($string)
    {
        if (preg_match_all("#<img.+?>#s", $string, $matches, PREG_PATTERN_ORDER) > 0) {
            $img = array();

            // Entire <img> tag
            $img['tag'] = $matches[0][0];

            // Image src
            if (preg_match("#src=\".+?\"#s", $img['tag'], $imgSrc)) {
                $img['src'] = str_replace('src="', '', $imgSrc[0]);
                $img['src'] = str_replace('"', '', $img['src']);
            } else {
                $img['src'] = false;
            }

            // Is this a real content image?
            if (preg_match("#\.(jpg|jpeg|png|gif|bmp)#s", strtolower($img['src']), $imgExt)) {
                $img['ext'] = true;
            } else {
                $img['ext'] = false;
            }

            return $img;
        }
    }
}
