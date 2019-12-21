IAKI (Import As K2 Image)
===

IAKI (short for Import As K2 Image) allows you to use article "body" images as K2 images.

Images that were inserted using a WYSIWYG editor in your introtext or fulltext, e.g. from imported Joomla content, can now be controlled like K2 uploaded images. This way you can utilize standard options in K2 for sizing and showing/hiding images per itemlist (category, tag etc.), item or module view.

IAKI will fetch the first (large) image from the article body (usually your main image) and assign it to the image positions used by K2 in all the K2 views (templates). That means you can now control these images as if they were K2 images.

If for some reason you want to move your old article images into a new folder (perhaps away from /images or /images/stories) because you want to clean up your folders, but you don't want to re-edit all your articles (in K2), you can simply move the images to the new folder and specify this folder in the plugin parameters, along with the old path.

So if we wanted to move all images e.g. from "images/stories/blog" to "images/archive/blog", we would first physically move the images to the new path and then specify the old and new path in the plugin parameters.

Please note that this plugin will not dynamically resize your Joomla article images as K2 images. The "resize" is done using HTML attributes on the K2 tag that is output. We plan to add resize options in a later version of the plugin.

If you want to provide feedback for this Joomla plugin, you may use the GitHub issue tracker here: https://github.com/joomlaworks/k2-iaki/issues


### COMPATIBILITY
IAKI is a K2 type plugin for Joomla versions 2.5 & 3.x, that is PHP 5 & PHP 7 compatible. We recommend using it with K2 v2.7.x or newer.


### LICENSE
IAKI is developed by JoomlaWorks and released under the GNU/GPL v2 license.


### DOWNLOAD
You can grab the latest release here: https://www.joomlaworks.net/downloads/?f=plg_k2_iaki-v2.2_j2.5-3.x.zip (v2.2 released December 21st, 2019)

To install this Joomla plugin, download the file in your computer and then head over to the Joomla installer and choose to upload the file you just downloaded.

An older release for Joomla 1.5 can be found here: https://www.joomlaworks.net/downloads/?f=plg_k2_iaki-v1.0_j1.5-2.5.zip
