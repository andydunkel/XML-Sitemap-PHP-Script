# XML Sitemap PHP Script 

This simple PHP script is meant to help you easily create XML Sitemaps for static files. 

The original script [XML Sitemap PHP script](http://yoast.com/xml-sitemap-php-script/) created and outputted the sitemap on the fly.

This version saves the sitemap to a file. It also creates an url list file for yahoo. This is intended for web sites that do not change that much and only need to run the script from time to time.

## Configuration

Open the config.php file and configure the settings. 

## Installation ##

Copy the script to your webserver. Set permissions for sitemap.xml and urllist.txt to writeable (usually 666 or 777).

## License

This script is licensed under the GPL v3.

## Changelog

* 2013-12-01 (DA):
    * Added empty output files
    * Added installation info to readme

* 2013-11-25 (DA):
    * Changed the script to output static files.

* 2013-09-22 (Original):
    * Some small bugfixes to the script.
    * Added license to readme.
    
* 2012-09-29 (Original):
    * Move configuration to config.php.
    * Fix URL output.
    * Add option to work recursively.
