JS & CSS Minifier for OpenCart
===================


This module is a integration of [minifier.org](http://minifier.org) to OpenCart. You need to have [vQmod](https://github.com/vqmod/vqmod) installed.


----------


How to install
-------------

The module don't replace any file, **but you need to do changes in both index.php files** inside root and admin directories.

1. Open index.php in your root directory and find

   // Document
   $registry->set('document', new Document());

replace it with

    // Compress
    $registry->set('compress', new Compress($registry));
	  // Document
    $registry->set('document', new Document($registry));

2. Do the same in your index.php file, inside **/admin/** directory
3. Upload all other files.

Need to know
-------------
1. The module combine and compress only JS and CSS files, added through **addScript** and **addStyle** functions.
2. Combined and compressed files are stored inside **/system/storage/cache/** directory
3. Minifier.org find all images and fonts inside every CSS file and rewrite the paths to them.
4. All images inside CSS files are converted to base64 format.
5. This module **don't have configuration options** through administration panel.
