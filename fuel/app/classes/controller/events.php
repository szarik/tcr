<?php
class Controller_Events extends \Controller_Template
{
	//list events
	function action_index()
	{
		$posts = \Model_Event::find('all');
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
		$this->template->set('content', $form->build(), false);
	}
}
?>