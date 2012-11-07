<?php
class Controller_Events extends \Controller_Template
{
	//list events
	function action_index()
	{
		$events = \Model_Event::find('all');
		$view = \View::forge('listing');
		$view->set('events', $events, false);
		$this->template->content = $view;
	}
	
	//add new event
	function action_add()
	{
		$fieldset = Fieldset::forge('smth')->add_model('Model_Event');
		
		//custom validations
		$val = Validation::instance('smth');
		$val->add_callable('\Model_Event');
		$val->field('place_id')->add_rule('is_int');
		$val->field('date_start')->add_rule('is_timestamp');
		$val->field('date_end')->add_rule('is_timestamp');
		$val->field('periodicity')->add_rule('is_int');
		$val->field('preferences')->add_rule('checkboxes_required');
		$val->field('price_normal')->add_rule('is_price');
		$val->field('price_discount')->add_rule('is_price');
		$val->set_message('is_int', '\':label\' musi byc wartoscia calkowita');
		$val->set_message('is_timestamp', '\':label\' musi byc data formatu YYYY-MM-DD HH:MM');
		$val->set_message('checkboxes_required', 'Przynajmniej jedna preferencja musi byc zaznaczona');
		$val->set_message('is_price', '\':label\' musi byc liczba zmiennoprzecinkowa');
		
		$form = $fieldset->form();
		$form->add('submit', '', array('type' => 'submit', 'value' => 'Dodaj', 'class' => 'btn medium primary'));
		if($fieldset->validation()->run() == true)
	    {
			$fields = $fieldset->validated();
			$event = new Model_Event;
			$event->place_id		= $fields['place_id'];
			$event->name			= $fields['name'];
			$event->description		= $fields['description'];
			$event->date_start		= $fields['date_start'];
			$event->date_end		= $fields['date_end'];
			$event->preferences		= Model_Event::flatten($fields['preferences']);
			$event->periodicity		= $fields['periodicity'];
			$event->coordinates		= $fields['coordinates'];
			
			//	TODO: walidacja required cena normal albo discount i Model_Event2Price
			$price_normal = new Model_Event2Price;
			$price_normal->event_id	= $fields['event_id'];
			$price_normal->price_name_id = 1;
			$price_normal->value	= $fields['price_normal'];
			
			$price_discount = new Model_Event2Price;
			$price_discount->event_id	= $fields['event_id'];
			$price_discount->price_name_id = 2;
			$price_discount->value	= $fields['price_discount'];
			
			if($event->save()  &&  $price_normal->save()  &&  $price_discount->save())
			{
				\Response::redirect('/'.$event->id);
			}
		}
		else
		{
			$this->template->messages = $fieldset->validation()->error();
		}
		$this->template->set('content', $form->build(), false);
	}
}
?>