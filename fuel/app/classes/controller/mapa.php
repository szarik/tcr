<?php

	class Controller_Mapa extends Controller_Ines_Site
	{
//list events
		function action_index()
		{
			//Prepare map (with all locales)
			$places = \Tocorobimy\Places::instance()->get();
			$opt = array('zoom' => 13, 'center' => 'new google.maps.LatLng(51.107885,17.038538)', 'mapTypeId' => 'google.maps.MapTypeId.ROADMAP');
			$map1 = new \InesGmap\Map('lokalizator', 'lokalizator', $opt);

			foreach ($places as $place) {
				$map1->addMarker(array('id' => $place->id, 'lat' => $place->map_lat, 'lng' => $place->map_lng));
			}

			$view = View::forge('default/mapa/index.smarty');
			$this->_tpl->set('body', $view);

			// Show map
			$mapa1_javascript = $map1->getScript(true);
			$view->set('lokalizator_javascript', $mapa1_javascript, false);
			$mapa1_html = $map1->getHtml('div', array('style' => 'width: 95%; height: 600px; border: 1px solid black; background: gray;'));
			$view->set('lokalizator_html', $mapa1_html, false);

			return $this->_tpl; // = View::forge('default/frontpage.smarty');
		}


		function action_szukaj()
		{

			// Get searching address
			$_address = trim((string) \Security::strip_tags(\Input::post('address', '')));
			$to_sess = preg_replace('/([Ww]+)([Rr]+)([Ooó]+)([Cc]+)([LlłŁ]+)([AaąĄ]+)([Ww]+)/', '', $_address);
			$to_sess = preg_replace('/[.,\'\"\\"]/', '', $to_sess);
			\Session::set('mapa_start', trim($to_sess)); // cut city name


			// Create new map and add address
			$opt = array('zoom' => 13, 'center' => 'new google.maps.LatLng(51.107885,17.038538)', 'mapTypeId' => 'google.maps.MapTypeId.ROADMAP');
			$map1 = new \InesGmap\Map('lokalizator', 'lokalizator', $opt);

			$map1->setAdditional(array('not_bound' => true)); // we do not want to bound all points

			$_single_place = array();
			foreach (\Tocorobimy\Places::instance()->get() as $place) {
				$_chack_data = $place->map_lat . '#' . $place->map_lng;
				if (!in_array($_chack_data, $_single_place)) {
					$map1->addMarker(array('id' => $place->id, 'lat' => $place->map_lat, 'lng' => $place->map_lng));
					$_single_place[] = $_chack_data;
				}
			}

			$map1->addGeocode('gmap_szukaj', array('address' => $_address));

			$view = View::forge('default/mapa/index.smarty');
			$this->_tpl->set('body', $view);

			// Show map
			$mapa1_javascript = $map1->getScript(true);
			$view->set('lokalizator_javascript', $mapa1_javascript, false);
			$mapa1_html = $map1->getHtml('div', array('style' => 'width: 95%; height: 600px; border: 1px solid black; background: gray;'));
			$view->set('lokalizator_html', $mapa1_html, false);

			return $this->_tpl; // = View::forge('default/frontpage.smarty');

		}

		function action_ajax($id)
		{
			$view = View::forge('default/mapa/ajax_lokal.smarty');
			$place = \Tocorobimy\Places::instance()->get($id)->current();
			$view->set('lokal', $place, false);
			$additional_places = \Tocorobimy\Places::instance()->get(null, array('map_lat' => $place->map_lat, 'map_lng' => $place->map_lng));
			$view->set('dodatkowe_lokale', $additional_places, false);
			$view->set('mapa_start', \Session::get('mapa_start', false));
			echo $view->render();
			die();
		}
	}