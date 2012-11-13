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

		// Header - formularz szukania po adresie
		$_header_form['open'] = \Form::open(array('action' => 'search/address', 'class' => 'navbar-search pull-left'));
		$_header_form['close'] = \Form::close();
		$_header_form['field'] = \Form::input('address', \Input::post('address', ''), array('placeholder' => 'Podaj adres', 'class' => 'search-query'));
		$_header_form['submit'] = \Form::button('submit', 'Szukaj', array('type' => 'submit', 'class' => 'btn btn-inverse'));
		$params->set('header_search', $_header_form, false);

		// Wydarzenia
		$fieldset = \Fieldset::forge('form_event')->add_model('Model_Event');
		$form = $fieldset->form();
		$form->add('price_free', 'Bilet darmowy', array('type' => 'checkbox'), array());
		$form->add('price_normal', 'Bilet normalny', array('type' => 'text'), array('is_price'));
		$form->add('price_discount', 'Bilet ulgowy', array('type' => 'text'), array('is_price'));
		$form->add('submit', '', array('type' => 'submit', 'value' => 'Dodaj', 'class' => 'btn medium primary'));
		$params->set('form_event', $form->build('events/add'), false);

		return $params;
	}

}