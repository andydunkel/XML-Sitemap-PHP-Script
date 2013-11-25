<?php

/**
 * XML Sitemap PHP Script
 * For more info, see: http://yoast.com/xml-sitemap-php-script/
 * Copyright (C), 2011 - 2012 - Joost de Valk, joost@yoast.com
 *
 * 2013 - Andy Dunkel andy.dunkel@ekiwi.de
 * Sitemap.xml output is done to a file
 * urllist.txt file is created for yahoo 
 */
 
require './config.php';

// Get the keys so we can check quickly
$replace_files = array_keys( $replace );

$xml = '<?xml version="1.0" encoding="utf-8"?>' . "\n";
$xml_content = "";
$urllist = "";

$ignore = array_merge( $ignore, array( '.', '..', 'config.php', 'xml-sitemap.php' ) );

if ( isset( $xsl ) && !empty( $xsl ) )
	$xml .= '<?xml-stylesheet type="text/xsl" href="' . SITEMAP_DIR_URL . $xsl . '"?>' . "\n";

function parse_dir( $dir, $url ) {
	global $ignore, $filetypes, $replace, $chfreq, $prio, $xml_content, $urllist	;

	$handle = opendir( $dir );
	while ( false !== ( $file = readdir( $handle ) ) ) {

		// Check if this file needs to be ignored, if so, skip it.
		if ( in_array( utf8_encode( $file ), $ignore ) )
			continue;	

		if ( is_dir( $dir . $file ) ) {		
			if ( defined( 'RECURSIVE' ) && RECURSIVE ) {						
				parse_dir($dir . $file . "/" , $url . $file . '/' );				
			}
		} 

		// Check whether the file has on of the extensions allowed for this XML sitemap
		$fileinfo = pathinfo( $dir . $file );
		if ( in_array( $fileinfo['extension'], $filetypes ) ) {

			// Create a W3C valid date for use in the XML sitemap based on the file modification time
			if (filemtime( $dir .'/'. $file )==FALSE) {
				$mod = date( 'c', filectime( $dir . $file ) );
			} else {
				$mod = date( 'c', filemtime( $dir . $file ) );
			}

			// Replace the file with it's replacement from the settings, if needed.
			if ( in_array( $file, $replace ) )
				$file = $replace[$file];

			// Start creating the output

    		$xml_content .= "<url>\n";
	 		$xml_content .= " <loc>" . $url . rawurlencode( $file ) . "</loc>\n";
	 		$xml_content .= " <lastmod>" . $mod . "</lastmod>\n";
	 		$xml_content .= " <changefreq>" . $chfreq . "</changefreq>\n";
	 		$xml_content .= " <priority>" . $prio . "</priority>\n";
	 		$xml_content .= "</url>\n";
	 		
	 		$urllist .= $url . rawurlencode( $file ) . "\n";
		}
	}
	closedir( $handle );			
}

function endsWith($haystack, $needle) {
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }

    return (substr($haystack, -$length) === $needle);
}

parse_dir( SITEMAP_DIR, SITEMAP_DIR_URL ) + "\n";

$xml .= "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";
$xml .= $xml_content;
$xml .= "</urlset>";

file_put_contents($xml_filename, $xml);
file_put_contents($urllist_filename, $urllist);
?>
