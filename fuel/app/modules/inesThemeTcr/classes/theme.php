<?php

namespace InesThemeTcr;

class Theme
{
	public static function _init()
	{
		// Add theme css
		\Asset::css('bootstrap.css');
		\Asset::css('bootstrap-responsive.css');
		\Asset::css('tcr.css');

		// Add extended JS
		\Asset::js('jquery.js');
		\Asset::js('jquery.greyscale.js');
		\Asset::js('jquery.hover.zoom.js');
		\Asset::js('bootstrap.js');

		// Register hooks
		\Ines::registerHook('view_extend_after', 'extend_view', 'InesThemeTcr\Theme');

		//\Ines::registerHook('engine_start', 'load_css', get_class());
	}


	// Extend default view by theme options
	public static function extend_view($params, $return)
	{
		return $params;
	}

}