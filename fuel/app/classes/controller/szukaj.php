<?php
	class Controller_Szukaj extends Controller_Ines_Site
	{
		public function action_index()
		{
			$_places = \Tocorobimy\Places::instance()->get();

			// Init map
			$opt = array('zoom' => 13, 'center' => 'new google.maps.LatLng(53.41935400090768, 14.58160400390625)', 'mapTypeId' => 'google.maps.MapTypeId.ROADMAP');
			$_map = new \InesGmap\Map('szukaj', 'szukaj', $opt);

			// Prepare callback function
			$callback = "
		function all_locales(results, status) {
		console.log(results);
			if (status == google.maps.GeocoderStatus.OK) {
				map_" . $_map->getId() . ".setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
            map:map_" . $_map->getId() . ",
            position:results[0].geometry.location
         });

		google.maps.event.addListener(marker, 'click', function(){
			marker.open(marker.getPosition().toUrlValue(6));
		});

            bounds_" . $_map->getId() . ".extend(results[0].geometry.location);
				map_" . $_map->getId() . ".fitBounds(bounds_" . $_map->getId() . ");
      }};
		";

			// Add to map
			$i = 1;
			foreach ($_places as $_place) {
				$_to_save = array('callback' => 'all_locales', 'code' => $callback);
				if ($i > 1) {
					$_to_save = 'all_locales';
				}
				$_map->addGeocode($i, array('address' => ($_place->adres . ',' . $_place->miasto)), $_to_save);
				$i++;
			}

			$view = View::forge('default/search/index.smarty');

			// Get prepared javascript and set to view
			$mapa_javascript = $_map->getScript(true);
			$view->set('map_javascript', $mapa_javascript, false);

			// Get prepared element html and set to view
			$mapa_html = $_map->getHtml('div', array('style' => 'width: 700px; height: 500px; border: 1px solid black; background: gray;'));
			$view->set('map_html', $mapa_html, false);


			$this->_tpl->set('body', $view);
			return $this->_tpl;
		}

		public function action_adres()
		{
			// Get searching address
			$_address = trim((string) \Security::strip_tags(\Input::post('address', '')));

			// Address controll
			if (strlen($_address) <= 1) {
				$_show_address_error = true;
			}

			// Create new map and add address
			$opt = array('zoom' => 13, 'center' => 'new google.maps.LatLng(53.41935400090768, 14.58160400390625)', 'mapTypeId' => 'google.maps.MapTypeId.ROADMAP');
			$_map = new \InesGmap\Map('szukaj', 'szukaj', $opt);
			$_map->addGeocode('gmap_szukaj', array('address' => $_address));

			$gmapjs = View::forge('default/search/gmap');
			$gmapjs->id = $_map->getId();
			$_map->setRaw($gmapjs);


			// Prepare view
			$view = View::forge('default/search/address.smarty');
			$view->set('map_code', $_map->getScript(true), false);
			$view->set('map_box', $_map->getHtml('div', array('class' => 'search_map_box')), false);
			$view->set('address', $_address);
			$this->_tpl->set('body', $view);
			return $this->_tpl;
		}


	}