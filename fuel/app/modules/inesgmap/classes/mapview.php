<?php

	namespace InesGmap;

	class Mapview
	{

		protected function _js()
		{
			$return = 'if (jQuery || typeof jQuery != "undefined") {';
			$return .= 'var map_' . $this->_id . ';';
			$return .= '$(function(){';


			$return .= 'var bounds_' . $this->_id . ' = new google.maps.LatLngBounds();';
			$return .= 'var mapwindow = new google.maps.InfoWindow();';

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
			$return .= $this->_js_markers();
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

		protected function _js_markers()
		{

			if(!isset($this->_additional['type'])) {
				$this->_additional['type'] = 'place';
			}

			if (!empty($this->_marker)) {
				$return = '';
				$return .= 'var markers = [];';
				$return .= 'var rozmiar = new google.maps.Size(32,32);';
				$return .= 'var rozmiar_cien = new google.maps.Size(59,32);';
				$return .= 'var punkt_startowy = new google.maps.Point(0,0);';
				$return .= 'var punkt_zaczepienia = new google.maps.Point(16,16);';
				$return .= 'var ikona = new google.maps.MarkerImage("http://maps.google.com/mapfiles/kml/pal3/icon61.png", rozmiar, punkt_startowy, punkt_zaczepienia);';
				$return .= 'var cien = new google.maps.MarkerImage("http://maps.google.com/mapfiles/kml/pal3/icon61s.png", rozmiar_cien, punkt_startowy, punkt_zaczepienia);';

				$i = 1;
				foreach ($this->_marker as $mark) {
					if (strlen(trim($mark['cords']['lat'])) > 0 && strlen(trim($mark['cords']['lng'])) > 0) {
						$return .= "var point_marker" . $i . " = new google.maps.LatLng(" . $mark['cords']['lat'] . ", " . $mark['cords']['lng'] . ");";
						$return .= "var marker_main" . $i . " = new google.maps.Marker({map:map_" . $this->_id . ", position:point_marker" . $i . ", id: " . $mark['cords']['id'] . ", type: '".$this->_additional['type']."', icon: ikona, shadow: cien});";

						if (isset($this->_additional['not_bound']) && $this->_additional['not_bound'] !== true) {
							$return .= "bounds_" . $this->_id . ".extend(point_marker" . $i . ");";
						}

						$return .= "google.maps.event.addListener(marker_main" . $i . ", 'click', function() {";
						$return .= "load_content(map_" . $this->_id . ", this, mapwindow);";
						$return .= "});";
						$return .= "markers.push(marker_main" . $i++ . ");";

					}
				}

				$return .= "var markerCluster = new MarkerClusterer(map_" . $this->_id . ", markers, {maxZoom: 14});";

				if (isset($this->_additional['not_bound']) && $this->_additional['not_bound'] !== true) {
					$return .= "map_" . $this->_id . ".fitBounds(bounds_" . $this->_id . ");";
				}

				return $return;
			}
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


			$retrun .= 'function load_content(map, marker, infowindow){';
			$retrun .= '$.ajax({';
			$retrun .= 'url: "' . \Uri::base(false) . 'mapa/ajax/" + marker.id + "/" + marker.type,';
			$retrun .= 'success: function(data){';
			$retrun .= 'infowindow.setContent(data);';
			$retrun .= 'infowindow.open(map, marker);';
			$retrun .= '}';
			$retrun .= '});';
			$retrun .= '}';

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