IAKI (Import As K2 Image) (v2.1)
=======

IAKI (short for Import As K2 Image) allows you to use Joomla! article images (from imported Joomla! content) as K2 images. So you can make use of the options in K2 for sizing and showing/hiding images on demand per category, item or other view.

This plugin is useful after you have imported Joomla! articles into K2, where images used to exist inside the content blocks (introtext and/or fulltext). IAKI will fetch the first image from the article body (usually your main image) and assign it to the image positions used by K2 in all the K2 views (templates). That means you can now control these images as if they were K2 images.

If for some reason you want to move your old article images into a new folder (perhaps away from /images or /images/stories) e.g. so you clean up your folders, but you don't want to re-edit all your articles (in K2), you can simply move the images to the new folder and specify this folder in the plugin parameters, along with the old path. So if we wanted to move all images e.g. from "images/stories/blog" to "images/archive/blog", we would physically moved the images first and then specify these 2 paths in the plugin parameters.

Please note that this plugin will not dynamically resize your Joomla! article images as K2 images. The "resize" is done using HTML attributes on the K2 <img /> tag that is output. We plan to add resize options in a later version of the plugin.


## REQUIREMENTS
- Joomla! 2.5 or newer (for v2.x that is hosted in this repository)
- K2 v2.5.x or newer


## DOWNLOADS
Download IAKI v1.0 for Joomla! 1.5: http://joomlaworks.googlecode.com/files/plg_k2_iaki-v1.0_j1.5-2.5.zip
Download IAKI v2.0 for Joomla! 2.5 or newer: http://joomlaworks.googlecode.com/files/plg_k2_iaki-v2.0_j2.5-3.0.zip


## LEARN MORE
Visit the IAKI product page at: http://getk2.org/extend/extensions/616-iaki-import-as-k2-image
