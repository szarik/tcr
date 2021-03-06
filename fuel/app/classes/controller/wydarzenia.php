<?php

	class Controller_Wydarzenia extends Controller_Ines_Site
	{
//list events
		function action_index()
		{
			$view = View::forge('default/tabs.smarty');
			$this->_tpl->set('body', $view);

			$this->action_strona(1);
			return $this->_tpl; // = View::forge('default/frontpage.smarty');
		}


		function action_strona($nr_strony)
		{
			//Prepare map (with all locales)
			$places = \Tocorobimy\Places::instance()->get();
			$opt = array('zoom' => 13, 'center' => 'new google.maps.LatLng(51.107885,17.038538)', 'mapTypeId' => 'google.maps.MapTypeId.ROADMAP');
			$map1 = new \InesGmap\Map('lokalizator', 'lokalizator', $opt);

			$_single_place = array();
			foreach ($places as $place) {
				$_chack_data = $place->map_lat . '#' . $place->map_lng;
				if (!in_array($_chack_data, $_single_place)) {
					$map1->addMarker(array('id' => $place->id, 'lat' => $place->map_lat, 'lng' => $place->map_lng));
					$_single_place[] = $_chack_data;
				}
			}

			// Show map
			$mapa1_javascript = $map1->getScript(true);
			$mapa1_html = $map1->getHtml('div', array('style' => 'width: 95%; height: 600px; border: 1px solid black; background: gray;'));

			$view = View::forge('default/tabs.smarty');
			$view->set('lokalizator_javascript', $mapa1_javascript, false);
			$view->set('lokalizator_html', $mapa1_html, false);

			$this->_tpl->set('body', $view);
			$this->_tpl->set('nr_strony', $nr_strony);
			return $this->_tpl; // = View::forge('default/frontpage.smarty');
		}

		public function action_wydarzenie($id_wydarzenia)
		{

			$view = View::forge('default/wydarzenie/wydarzenie.smarty');
			$this->_tpl->set('body', $view);
			$this->_tpl->set('id_wydarzenia', $id_wydarzenia);

			return $this->_tpl; // = View::forge('default/frontpage.smarty');

		}

		function action_dodaj()
		{
			$fieldset = Fieldset::forge('form_event')->add_model('Model_Event');

			//custom validations
			$val = Validation::instance('form_event');
			$val->add_callable('\Model_Event');
			$val->set_message('required', 'Pole \':label\' jest wymagane');
			$val->field('date_start')->add_rule('is_timestamp');
			$val->field('date_end')->add_rule('is_timestamp');
			$val->set_message('is_int', '\':label\' musi byc wartoscia calkowita');
			$val->set_message('is_timestamp', '\':label\' musi byc data formatu YYYY-MM-DD HH:MM');
			$val->set_message('checkboxes_required', 'Przynajmniej jedna preferencja musi byc zaznaczona');
			$val->set_message('is_price', '\':label\' musi byc liczba zmiennoprzecinkowa');
			$val->set_message('valid_url', '\':label\' musi byc poprawnym adresem URL');

			if ($fieldset->validation()->run() == true) {
				$fields = $fieldset->validated();
				$event = new Model_Event;
				$event->place_id = $fields['place_id'];
				$event->name = $fields['name'];
				$event->description = $fields['description'];
				$event->link = $fields['link'];
				$event->link_photo = $fields['link_photo'];
				$event->link_movie = $fields['link_movie'];
				$event->date_start = $fields['date_start'];
				$event->date_end = $fields['date_end'];
				$event->coordinates = $fields['coordinates'];
				$event->category_id = $fields['category_id'];

				$success_event = $event->save();
				$success_price1 = true;
				$success_price2 = true;
				$success_price3 = true;

				if (isset($fields['price_free'])) {
					$price_free = new Model_Event2Price;
					$price_free->event_id = $event->id;
					$price_free->price_name_id = 3;
					$success_price1 = $price_free->save();
				}
				if ($fields['price_normal'] != null) {
					$price_normal = new Model_Event2Price;
					$price_normal->event_id = $event->id;
					$price_normal->value = $fields['price_normal'];
					$price_normal->price_name_id = 1;
					$success_price2 = $price_normal->save();
				}
				if ($fields['price_discount'] != null) {
					$price_discount = new Model_Event2Price;
					$price_discount->event_id = $event->id;
					$price_discount->value = $fields['price_discount'];
					$price_discount->price_name_id = 2;
					$success_price3 = $price_discount->save();
				}

				if ($success_event && $success_price1 && $success_price2 && $success_price3) {
					\Response::redirect('/');
				} else {
					//	some records failed to save - rollback database changes
					$event->delete();
					if (isset($fields['price_free'])) $price_free->delete();
					if ($fields['price_normal'] != null) $price_normal->delete();
					if ($fields['price_discount'] != null) $price_discount->delete();
				}
			} else {
				$html = "<ul>";
				$error_list = $fieldset->validation()->error();
				foreach ($error_list as $error) {
					$html .= "<li>" . $error . "</li>";
				}
				$html .= "</ul>";

				if (count($error_list) > 0) {
					$html .= "<script type=\"text/javascript\">$(function(){show_events_popup();});</script>";
				}

				$this->_tpl->set('event_messages', $html, false);
			}
		}
	}

?>