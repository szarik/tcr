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
		$val->set_message('is_int', ':label musi byc wartoscia calkowita');
		$val->set_message('is_timestamp', ':label musi byc data formatu YYYY-MM-DD HH:MM');
		
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
			$event->preferences		= $fields['preferences'];
			$event->periodicity		= $fields['periodicity'];
			$event->coordinates		= $fields['coordinates'];
			
			if($event->save())
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