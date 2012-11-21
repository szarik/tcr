<?php

	namespace InesGmap;

	class Mapview
	{

		protected function _js()
		{
			$return = 'if (jQuery || typeof jQuery != "undefined") {';
			$return .= '$(function(){';

			$return .= 'var map_' . $this->_id . ';';
			$return .= 'var bounds_' . $this->_id . ' = new google.maps.LatLngBounds();';

			$return .= $this->_js_map();

			$return .= 'gmap_' . $this->_id . '();';

			$return .= $this->_js_functions();

			$return .= "});}else{alert('inesGmap required jQuery!');}";

			return $return;
		}

		/**
		 * View for main gmap func
		 * @return string
		 */
		protected function _js_map()
		{

			// Init
			$return = '';
			$i = 1;

			// Main Gmap function
			$return .= 'function gmap_' . $this->_id . '() {';
			$return .= 'var o = {';
			foreach ($this->_mapoptions as $opt => $val) {
				$return .= $opt . ':' . $val . (($i++ < count($this->_mapoptions)) ? ',' : '');
			}
			$return .= "};";
			$return .= $this->_js_geocode();
			$return .= 'map_' . $this->_id . ' = new google.maps.Map(document.getElementById("' . $this->_container . '"), o);';
			$return .= '}';

			return $return;
		}

		/**
		 * Prepare view for Geocode
		 * @return null|string
		 */
		protected function _js_geocode()
		{
			// Add geocodes
			if (!empty($this->_geocode)) {
				$return = '';
				foreach ($this->_geocode as $gid => $gopt) {
					$return .= "var geocode_" . $gid . ' =  new google.maps.Geocoder();';
					if (is_array($gopt) && !empty($gopt)) {
						$return .= 'geocode_' . $gid . '.geocode({';
						$i = 1;
						foreach ($gopt['options'] as $optn => $optv) {
							if (in_array($optn, array('address', 'bounds', 'location', 'region'))) {
								$return .= $optn . ': "' . $optv . '"' . (($i++ < count($gopt['options'])) ? ',' : '');
							}
						}
						$return .= '}' . ((isset($gopt['callback'])) ? ',' . $gopt['callback'] : ',geocode_mark_default') . ');'; // callback method
					}
				}
				return $return;
			}
			return '';
		}

		protected function  _js_functions()
		{
			$retrun = 'function geocode_mark_default(results, status) {';
			$retrun .= 'if (status == google.maps.GeocoderStatus.OK) {';
			$retrun .= 'map_' . $this->_id . '.setCenter(results[0].geometry.location);';
			$retrun .= 'var marker = new google.maps.Marker({';
			$retrun .= 'map:map_' . $this->_id . ',';
			$retrun .= 'position:results[0].geometry.location';
			$retrun .= '});';
			$retrun .= '} else {';
			$retrun .= 'alert("Geocode was not successful for the following reason: " + status + " in callback: geocode_mark_default");';
			$retrun .= '}}';


			// Geocodes callbacks
			if (isset($this->_geocode) && !empty($this->_geocode)) {
				foreach ($this->_geocode as $gopt) {
					if (isset($gopt['callback_code'])) {
						$retrun .= $gopt['callback_code'] . "\n";
					}
				}
			}

			// Additional code
			$retrun .= str_replace("\n", "", $this->_raw);

			return $retrun;
		}
	}