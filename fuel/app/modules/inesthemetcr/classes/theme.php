<?php

namespace InesThemeTcr;

use Fuel\Core\Arr;

class Theme
{
	public static function _init()
	{
		// Add theme css
		\Asset::css('bootstrap.css');
		\Asset::css('bootstrap-responsive.css');
		\Asset::css('colorbox.css');
		\Asset::css('daterangepicker.css');
		\Asset::css('tcr.css');

		// Add extended JS
		\Asset::js('jquery.js');
		\Asset::js('jquery.greyscale.js');
		\Asset::js('jquery.hover.zoom.js');
		\Asset::js('jquery.colorbox-min.js');
		\Asset::js('jquery.animate-colors.js');
		\Asset::js('bootstrap.js');
		\Asset::js('daterangepicker.js');
		\Asset::js('date.js');
		\Asset::js('tcr.js');

		// Register hooks
		\Ines::registerHook('view_extend_after', 'extend_view', 'InesThemeTcr\Theme');

		//\Ines::registerHook('engine_start', 'load_css', get_class());
		
		//  Populate form's selectboxes
		\Model_Event::populate_place_ids();
		\Model_Event::populate_category_ids();
	}


	// Extend default view by theme options
	public static function extend_view($params, $return)
	{
		//	indicates which link to select as being visited
		$temp = explode(\Uri::base(), \Uri::current());
		$current_site = $temp[1];
		$params->set('current_site', $current_site, false);
		//	set preferences tabs and their selection
		$preferences = array();
		array_push($preferences, array('name' => 'Sam', 'selected' => (@strstr(strtolower(\Input::get('preferencja')), 'sam') ? 'true' : 'false')));
		array_push($preferences, array('name' => 'Para', 'selected' => (@strstr(strtolower(\Input::get('preferencja')), 'para') ? 'true' : 'false')));
		array_push($preferences, array('name' => 'Grupa', 'selected' => (@strstr(strtolower(\Input::get('preferencja')), 'grupa') ? 'true' : 'false')));
		$params->set('preferences', $preferences, false);
		
		//	set prices tabs and their selection
		$prices = array();
		array_push($prices, array('name' => 'od 0 zł do 20 zł', 'get_param' => '0-20','selected' => (@strstr(strtolower(\Input::get('cena')), '0-20') ? 'true' : 'false')));
		array_push($prices, array('name' => 'do 40 zł', 'get_param' => '0-40','selected' => (@strstr(strtolower(\Input::get('cena')), '0-40') ? 'true' : 'false')));
		array_push($prices, array('name' => 'do 60 zł', 'get_param' => '0-60','selected' => (@strstr(strtolower(\Input::get('cena')), '0-60') ? 'true' : 'false')));
		array_push($prices, array('name' => 'do 80 zł', 'get_param' => '0-80','selected' => (@strstr(strtolower(\Input::get('cena')), '0-80') ? 'true' : 'false')));
		array_push($prices, array('name' => 'do 100 zł', 'get_param' => '0-100','selected' => (@strstr(strtolower(\Input::get('cena')), '0-100') ? 'true' : 'false')));
		$params->set('prices', $prices, false);
		
		$params->set('places', \Tocorobimy\Places::instance()->get(), false);
		$_r = \Tocorobimy\Places::instance()->get(\Input::get('lokal'));
		$params->set('selected_place', $_r->current(), false);

		// filter events
		$events_for_sidepanel = \Tocorobimy\Model\Tocorobimy::get_events_for_filters(
				\Input::get('preferencja') ? explode(',', \Input::get('preferencja')) : array(),
				\Input::get('cena') ? explode(',', \Input::get('cena')) : array(),
				\Input::get('data'));
		$events = \Tocorobimy\Model\Tocorobimy::get_events_for_categories($events_for_sidepanel, \Input::get('kategoria') ? explode(',', \Input::get('kategoria')) : array());


		// Events map
		$opt = array('zoom' => 13, 'center' => 'new google.maps.LatLng(51.107885,17.038538)', 'mapTypeId' => 'google.maps.MapTypeId.ROADMAP');
		$map2 = new \InesGmap\Map('lokalizator_wydarzen', 'lokalizator_wydarzen', $opt);

		$_single_place = array();
		foreach ($events as $event) {
			$_chack_data = $event->map_lat . '#' . $event->map_lng;
			if (!in_array($_chack_data, $_single_place)) {
				$map2->addMarker(array('id' => $event->id, 'lat' => $event->map_lat, 'lng' => $event->map_lng));
				$_single_place[] = $_chack_data;
			}
		}
		// Show map
		$params->set('lokalizator_wydarzen_javascript', $map2->getScript(true), false);
		$params->set('lokalizator_wydarzen_html', $map2->getHtml('div', array('style' => 'width: 95%; height: 600px; border: 1px solid black; background: gray;')), false);



		//	set categories tabs, their selection and counter for filtered events
		$categories = \Tocorobimy\Categories::instance()->get();
		$event_categories = array();
		foreach($categories as $cat)
		{
			$how_many = \Tocorobimy\Model\Tocorobimy::get_number_of_events($events_for_sidepanel, $cat->id);
			array_push($event_categories, array('id' => $cat->id, 'name' => $cat->name,
			'how_many' => $how_many, 'selected' => (@strstr(\Input::get('kategoria'), $cat->name) ? 'true' : 'false')));
		}
		$params->set('events_all', \Tocorobimy\Model\Tocorobimy::get_number_of_events($events_for_sidepanel), false);
		$params->set('event_categories', $event_categories, false);
		
		//	set filtered events on result list
		$params->set('events', $events, false);
		
		// Header
		//		search form by address
		$_header_form['open'] = \Form::open(array('action' => 'mapa/szukaj', 'class' => 'navbar-search pull-left'));
		$_header_form['close'] = \Form::close();
		$_header_form['field'] = \Form::input('address', \Input::post('address', ''), array('placeholder' => 'Podaj adres', 'class' => 'search-query'));
		$_header_form['submit'] = \Form::button('submit', 'Szukaj', array('type' => 'submit', 'class' => 'btn btn-inverse'));
		$params->set('header_search', $_header_form, false);
		//		links
		$params->set('strona_glowna_header', \Html::anchor('/', 'Strona główna'), false);
		$params->set('highlight_strona_glowna', strpos($current_site, 'wydarzenia/') !== false);
		$params->set('jak_to_dziala_header', \Html::anchor('strona/jak_to_dziala', 'Jak to działa?'), false);
		$params->set('kontakt_header', \Html::anchor('strona/kontakt', 'Kontakt'), false);

		// Events
		$fieldset = \Fieldset::forge('form_event')->add_model('Model_Event');
		$form = $fieldset->form();
		$form->repopulate();
		$form->add('price_free', 'Bilet darmowy', array('type' => 'checkbox'), array());
		$form->add('price_normal', 'Bilet normalny', array('type' => 'text'), array('is_price'));
		$form->add('price_discount', 'Bilet ulgowy', array('type' => 'text'), array('is_price'));
		$form->add('submit', '', array('type' => 'submit', 'value' => 'Dodaj', 'class' => 'btn medium primary'));
		$params->set('form_event', $form->build('wydarzenia/dodaj'), false);
		
		// Places
		$fieldset = \Fieldset::forge('form_place')->add_model('Model_Place');
		$form = $fieldset->form();
		$form->repopulate();
		$form->add('submit', '', array('type' => 'submit', 'value' => 'Dodaj', 'class' => 'btn medium primary'));
		$params->set('form_place', $form->build('miejsca/dodaj'), false);

		// Footer
		//		Regulamin
		$params->set('regulamin_footer', \Html::anchor('strona/regulamin', 'Regulamin', array('class' => strpos($current_site, 'strona/regulamin') !== false ? 'footer_active' : 'footer_link')), false);
		//		Prawa autorskie
		$params->set('prawa_autorskie_footer', \Html::anchor('strona/prawa_autorskie', 'Prawa autorskie', array('class' => strpos($current_site, 'strona/prawa_autorskie') !== false ? 'footer_active' : 'footer_link')), false);
		//		Kontakt
		$params->set('kontakt_footer', \Html::anchor('strona/kontakt', 'Kontakt', array('class' => strpos($current_site, 'strona/kontakt') !== false ? 'footer_active' : 'footer_link')), false);
		//		Zglos błąd
		$params->set('zglos_blad_footer', \Html::anchor('strona/zglos_blad', 'Zgłoś błąd', array('class' => strpos($current_site, 'strona/zglos_blad') !== false ? 'footer_active' : 'footer_link')), false);
		//		Jak to działa?
		$params->set('jak_to_dziala_footer', \Html::anchor('strona/jak_to_dziala', 'Jak to działa?', array('class' => strpos($current_site, 'strona/jak_to_dziala') !== false ? 'footer_active' : 'footer_link')), false);
		
		return $params;
	}
}