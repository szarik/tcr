<?php

namespace InesGmap;

class Gmap
{

	/**
	 * Google Maps Javascript file.
	 *
	 * @var string
	 * @access private
	 */
	private static $_google_js = 'http://maps.googleapis.com/maps/api/js?key=%s&sensor=%s';

	/**
	 * Init class
 	 */
	public static function _init()
	{
		//\Ines::registerHook('engine_start', 'load_maps', get_class());
		// Load Gmap configuration
		\Config::load('inesGmap::gmap', 'gmap');

		// Required jquery
		\Asset::js('jquery.js');

		// Add Google Map assets to autoload
		\Asset::js(vsprintf(self::$_google_js, array(\Config::get('gmap.api'), \Config::get('gmap.sensor'))), array(), 'external');
		\Asset::js('gmap.mc.js', 'external');
	}

}