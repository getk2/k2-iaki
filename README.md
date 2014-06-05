IAKI (Import As K2 Image)
=========

IAKI (short for Import As K2 Image) allows you to use Joomla! article images (from imported Joomla! content) as K2 images. So you can make use of the options in K2 for sizing and showing/hiding images on demand per category, item or other view.

This plugin is useful after you have imported Joomla! articles into K2, where images used to exist inside the content blocks (introtext and/or fulltext). IAKI will fetch the first image from the article body (usually your main image) and assign it to the image positions used by K2 in all the K2 views (templates). That means you can now control these images as if they were K2 images.

If for some reason you want to move your old article images into a new folder (perhaps away from /images or /images/stories) e.g. so you clean up your folders, but you don't want to re-edit all your articles (in K2), you can simply move the images to the new folder and specify this folder in the plugin parameters, along with the old path. So if we wanted to move all images e.g. from "images/stories/blog" to "images/archive/blog", we would physically moved the images first and then specify these 2 paths in the plugin parameters.

Please note that this plugin will not dynamically resize your Joomla! article images as K2 images. The "resize" is done using HTML attributes on the K2 <img /> tag that is output. We plan to add resize options in a later version of the plugin.


### FEATURES
A K2 plugin for Joomla that converts the first found image inside your article's content into a K2 image. Handy for migrating sites from the default Joomla article system into K2.


### DEMO & SHOWCASE
This plugin has been extensively used in many Joomla sites where the content was moved from the default Joomla article system into K2. Such an example is: http://www.cinemad.gr

If you browse to any category (e.g. http://www.cinemad.gr/news) and navigate (using the pagination links) to some of the oldest articles, you see that any embedded images are now K2 images for both K2 listing and item pages.


### REQUIREMENTS
This is a K2 plugin for Joomla and the only basic requirements to use it are:

- K2 v2.5.x or newer installed
- Joomla 2.5 or 3.x installed


### LICENSE
This is a Joomla! extension developed by JoomlaWorks and released under the GNU/GPL v2 license.


### ADDITIONAL INFO
Some helpful links:

- K2 - http://getk2.org
- Joomla - http://www.joomla.org

If you want to provide feedback for this Joomla plugin, you may use the GitHub issue tracker here: https://github.com/joomlaworks/k2-iaki/issues


## DOWNLOAD
You can grab the latest release here: http://goo.gl/KnZHqJ (v2.1)

To install this Joomla plugin, download the file in your computer and then head over to the Joomla installer and choose to upload the file you just downloaded.

An older release for Joomla 1.5 can be found here: http://joomlaworks.googlecode.com/files/plg_k2_iaki-v1.0_j1.5-2.5.zip
