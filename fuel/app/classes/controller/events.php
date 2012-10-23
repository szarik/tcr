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
		$fieldset = Fieldset::forge()->add_model('Model_Event');
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