<?php

namespace InesThemeTcr;

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
		// Tocorobimy
		$params->set('event_categories', \Tocorobimy\Categories::instance()->get(), false);
		$params->set('places', \Tocorobimy\Places::instance()->get(), false);
		$_r = \Tocorobimy\Places::instance()->get(\Input::get('lokal'));
		$params->set('selected_place', $_r->current(), false);
		// Tocorobimy / Events - czyli pobranie wydarzeń 
		$params->set('events', \Tocorobimy\Events::instance()->get(), false); 

		// Header
		//		formularz szukania po adresie
		$_header_form['open'] = \Form::open(array('action' => 'szukaj/adres', 'class' => 'navbar-search pull-left'));
		$_header_form['close'] = \Form::close();
		$_header_form['field'] = \Form::input('address', \Input::post('address', ''), array('placeholder' => 'Podaj adres', 'class' => 'search-query'));
		$_header_form['submit'] = \Form::button('submit', 'Szukaj', array('type' => 'submit', 'class' => 'btn btn-inverse'));
		$params->set('header_search', $_header_form, false);
		//		link to 'Jak to działa?'
		$params->set('jak_to_dziala_header', \Html::anchor('strona/jak_to_dziala', 'Jak to działa?'), false);

		// Wydarzenia
		$fieldset = \Fieldset::forge('form_event')->add_model('Model_Event');
		$form = $fieldset->form();
		$form->repopulate();
		$form->add('price_free', 'Bilet darmowy', array('type' => 'checkbox'), array());
		$form->add('price_normal', 'Bilet normalny', array('type' => 'text'), array('is_price'));
		$form->add('price_discount', 'Bilet ulgowy', array('type' => 'text'), array('is_price'));
		$form->add('submit', '', array('type' => 'submit', 'value' => 'Dodaj', 'class' => 'btn medium primary'));
		$params->set('form_event', $form->build('wydarzenia/dodaj'), false);
		
		// Miejsca
		$fieldset = \Fieldset::forge('form_place')->add_model('Model_Place');
		$form = $fieldset->form();
		$form->repopulate();
		$form->add('submit', '', array('type' => 'submit', 'value' => 'Dodaj', 'class' => 'btn medium primary'));
		$params->set('form_place', $form->build('miejsca/dodaj'), false);

		// Stopka
		//		Regulamin
		$params->set('regulamin_footer', \Html::anchor('strona/regulamin', 'Regulamin', array('class' => 'footer-link')), false);
		//		Prawa autorskie
		$params->set('prawa_autorskie_footer', \Html::anchor('strona/prawa_autorskie', 'Prawa autorskie', array('class' => 'footer-link')), false);
		//		Kontakt
		$params->set('kontakt_footer', \Html::anchor('strona/kontakt', 'Kontakt', array('class' => 'footer-link')), false);
		//		Zglos blad
		$params->set('zglos_blad_footer', \Html::anchor('strona/zglos_blad', 'Zgłoś błąd', array('class' => 'footer-link')), false);
		//		Jak to dziala
		$params->set('jak_to_dziala_footer', \Html::anchor('strona/jak_to_dziala', 'Jak to działa?', array('class' => 'footer-link')), false);
		
		return $params;
	}

}