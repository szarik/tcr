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
		\Asset::css('tcr.css');

		// Add extended JS
		\Asset::js('jquery.js');
		\Asset::js('jquery.greyscale.js');
		\Asset::js('jquery.hover.zoom.js');
		\Asset::js('jquery.colorbox-min.js');
		\Asset::js('jquery.animate-colors.js');
		\Asset::js('bootstrap.js');
		\Asset::js('tcr.js');

		// Register hooks
		\Ines::registerHook('view_extend_after', 'extend_view', 'InesThemeTcr\Theme');

		//\Ines::registerHook('engine_start', 'load_css', get_class());
	}


	// Extend default view by theme options
	public static function extend_view($params, $return)
	{
		//	count events for categories
		$categories = \Tocorobimy\Categories::instance()->get();
		$event_categories = array();
		foreach($categories as $cat)
		{
			$how_many = \Tocorobimy\Model\Tocorobimy::get_number_of_events($cat->id);
			array_push($event_categories, array('id' => $cat->id, 'name' => $cat->name, 'how_many' => $how_many));
		}
		
		$params->set('event_categories', $event_categories, false);
		$params->set('events_all', \Tocorobimy\Model\Tocorobimy::get_number_of_events(), false);
		$params->set('places', \Tocorobimy\Places::instance()->get(), false);
		$_r = \Tocorobimy\Places::instance()->get(\Input::get('lokal'));
		$params->set('selected_place', $_r->current(), false);
		$events = \Tocorobimy\Model\Tocorobimy::get_events_for_filters(
				\Input::get('kategoria') ? array(\Input::get('kategoria')) : array(),
				\Input::get('preferencja') ? array(\Input::get('preferencja')) : array());
		$params->set('events', $events, false);
		$params->set('kategoriaa',\Input::get('kategoria'));

		// Header
		//		search form by address
		$_header_form['open'] = \Form::open(array('action' => 'szukaj/adres', 'class' => 'navbar-search pull-left'));
		$_header_form['close'] = \Form::close();
		$_header_form['field'] = \Form::input('address', \Input::post('address', ''), array('placeholder' => 'Podaj adres', 'class' => 'search-query'));
		$_header_form['submit'] = \Form::button('submit', 'Szukaj', array('type' => 'submit', 'class' => 'btn btn-inverse'));
		$params->set('header_search', $_header_form, false);
		//		link to 'Jak to działa?'
		$params->set('jak_to_dziala_header', \Html::anchor('strona/jak_to_dziala', 'Jak to działa?'), false);

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
		$params->set('regulamin_footer', \Html::anchor('strona/regulamin', 'Regulamin', array('class' => 'footer-link')), false);
		//		Prawa autorskie
		$params->set('prawa_autorskie_footer', \Html::anchor('strona/prawa_autorskie', 'Prawa autorskie', array('class' => 'footer-link')), false);
		//		Kontakt
		$params->set('kontakt_footer', \Html::anchor('strona/kontakt', 'Kontakt', array('class' => 'footer-link')), false);
		//		Zglos błąd
		$params->set('zglos_blad_footer', \Html::anchor('strona/zglos_blad', 'Zgłoś błąd', array('class' => 'footer-link')), false);
		//		Jak to działa?
		$params->set('jak_to_dziala_footer', \Html::anchor('strona/jak_to_dziala', 'Jak to działa?', array('class' => 'footer-link')), false);
		
		return $params;
	}

}