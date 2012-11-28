<?php
namespace InesGmap;


class Controller_Example extends \Controller
{

	public function action_index()
	{
		$view = \View::forge('inesgmap::example');

		// Create new map
		$opt = array('zoom' => 13, 'center' => 'new google.maps.LatLng(53.41935400090768, 14.58160400390625)', 'mapTypeId' => 'google.maps.MapTypeId.ROADMAP');

		$map1 = new \InesGmap\Map('demo1', 'demo1', $opt);

		// Add new geocode
		$map1->addGeocode('paris_id', array('address' => 'Paris'));
		//$map1->addGeocode('2', array('address' => 'Paris'), 'zwrotna');

		// Get prepared javascript and set to view
		$mapa1_javascript = $map1->getScript(true);
		$view->set('map1_javascript', $mapa1_javascript, false);

		// Get prepared element html and set to view
		$mapa1_html = $map1->getHtml('div', array('style' => 'width: 700px; height: 500px; border: 1px solid black; background: gray;'));
		$view->set('map1_html', $mapa1_html, false);


		// Create another new map
		$map2 = new \InesGmap\Map();

		// Prepare callback function
		$callback = "
		function zwrotna(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				map_" . $map2->getId() . ".setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
            map:map_" . $map2->getId() . ",
            position:results[0].geometry.location
         });
         	console.log(results);
            bounds_" . $map2->getId() . ".extend(results[0].geometry.location);
				map_" . $map2->getId() . ".fitBounds(bounds_" . $map2->getId() . ");
      }};
		";

		// Add new geocodes
		// we added custom callback function only once!
		$map2->addGeocode('1', array('address' => 'Aleja Śląska, Wrocław'), array('callback' => 'zwrotna', 'code' => $callback));
		$map2->addGeocode('2', array('address' => 'Orzechowa, Wrocław'), 'zwrotna');
		$map2->addGeocode('3', array('address' => 'Piastowska 2, Wrocław'), 'zwrotna');
		$map2->addGeocode('4', array('address' => 'Stanisławowska, Wrocław'), 'zwrotna');
		$map2->addGeocode('5', array('address' => 'Węgliniec'), 'zwrotna');

		// Get prepared javascript and set to view
		$mapa2_javascript = $map2->getScript(true);
		$view->set('map2_javascript', $mapa2_javascript, false);

		// Get prepared element html and set to view
		$mapa2_html = $map2->getHtml('div', array('style' => 'width: 700px; height: 500px; border: 1px solid black; background: gray;'));
		$view->set('map2_html', $mapa2_html, false);

		return new \Response($view, 400);
	}


}