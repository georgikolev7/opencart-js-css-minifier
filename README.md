# JS & CSS Minifier for OpenCart
This module is a integration of minifier.org to OpenCart.
You need to have vQmod installed.

<strong>Important</strong>
Open index.php and your root directory, find<br/>
// Document
$registry->set('document', new Document());

and replace with

// Compress
$registry->set('compress', new Compress($registry));

// Document
$registry->set('document', new Document($registry));

To the same in your index.php, inside /admin/ directory.
