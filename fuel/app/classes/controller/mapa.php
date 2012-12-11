<?php

	class Controller_Mapa extends Controller_Ines_Site
	{
//list events
		function action_index()
		{
			//Prepare map (with all locales)
			$places = \Tocorobimy\Places::instance()->get();
			$opt = array('zoom' => 13, 'center' => 'new google.maps.LatLng(51.107885,17.038538)', 'mapTypeId' => 'google.maps.MapTypeId.TERRAIN');
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


		function action_ajax($id)
		{
			$lokl = \Tocorobimy\Places::instance()->get($id)->current();
			$view = View::forge('default/mapa/ajax_lokal.smarty');
			$view->set('lokal', \Tocorobimy\Places::instance()->get($id)->current(), false);
			echo $view->render();
			die();
		}
	}