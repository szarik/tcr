<?php


class Controller_Search extends Controller_Ines_Site
{



	public function action_index()
	{
		$view = View::forge('default/search/index.smarty');
		$this->_tpl->set('body', $view);
		return $this->_tpl;
	}

	public function action_address()
	{
		// Get searching address
		$_address = trim((string) \Security::strip_tags(\Input::post('address', '')));

		// Address controll
		if(strlen($_address) <= 1) {
			$_show_address_error = true;
		}

		// Create new map and add address
		$_map = new \InesGmap\Map();
		$_map->addGeocode(array('address' => $_address));
		$_map->setZoom(13);

		// Prepare view
		$view = View::forge('default/search/address.smarty');
		$view->set('map_code', $_map->getScript(true), false);
		$view->set('map_box', $_map->getHtml('div', array('class' => 'search_map_box')), false);
		$view->set('address', $_address);
		$this->_tpl->set('body', $view);
		return $this->_tpl;
	}


}