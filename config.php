<?php
/**
 * Change the configuration below and rename this file to config.php
 */

/*
 * The directory to check.
 * Make sure the DIR ends ups in the Sitemap Dir URL below, otherwise the links to files will be broken!
 */
define( 'SITEMAP_DIR', './' );

// With trailing slash!
define( 'SITEMAP_DIR_URL', 'http://www.example.com/' );

// Whether or not the script should check recursively.
define( 'RECURSIVE', true );

// The file types, you can just add them on, so 'pdf', 'php' would work
$filetypes = array( 'php', 'htm', 'html', 'pdf' );

// The replace array, this works as file => replacement, so 'index.php' => '', would make the index.php be listed as just /
$replace = array( 'index.php' => '' );

// The XSL file used for styling the sitemap output, make sure this path is relative to the root of the site.
$xsl = 'xml-sitemap.xsl';

// The file name of the sitemap.xml file, which is created by the script
$xml_filename = 'sitemap.xml';

// The file name of the urllist file, which is created by the script
$urllist_filename = 'urllist.txt';

// The Change Frequency for files (note: thats only a hint for the search engine, not an order)
// options are: always, hourly, daily, weekly, monthly, yearly, never
$chfreq = 'monthly';

// The Priority Frequency for files. There's no way to differentiate so it might just as well be 1.
$prio = 1;

// Ignore array, all files in this array will be: ignored!
$ignore = array( 'config.php' );
