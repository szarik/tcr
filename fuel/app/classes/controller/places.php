<?php
class Controller_Places extends \Controller_Template
{
	//list places
	function action_index()
	{
		$places = \Model_Place::find('all');
		$view = \View::forge('list_places');
		$view->set('places', $places, false);
		$this->template->content = $view;
	}
	
	//add new place
	function action_add()
	{
		$fieldset = Fieldset::forge()->add_model('Model_Place')->repopulate();
		$form = $fieldset->form();
		$form->add('submit', '', array('type' => 'submit', 'value' => 'Dodaj', 'class' => 'btn medium primary'));
		if($fieldset->validation()->run() == true)
	    {
			$fields = $fieldset->validated();
			$place = new Model_Place;
			$place->name			= $fields['name'];
			$place->description		= $fields['description'];
			$place->address			= $fields['address'];
			$place->open_time		= $fields['open_time'];
			$place->coordinates		= $fields['coordinates'];
			
			if($place->save())
			{
				\Response::redirect('places/edit/'.$place->id);
			}
		}
		else
		{
			$this->template->messages = $fieldset->validation()->error();
		}
		$this->template->set('content', $form->build(), false);
	}
	
	   //edit
	function action_edit($id)
	{
	   $place = \Model_Place::find($id);
	   $fieldset = Fieldset::forge()->add_model('Model_Place')->populate($place);
	   $form     = $fieldset->form();
	   $form->add('submit', '', array('type' => 'submit', 'value' => 'Zapisz', 'class' => 'btn medium primary'));
	   if($fieldset->validation()->run() == true)
	   {
			$fields = $fieldset->validated();
			//$place = new Model_Place;
			$place->name			= $fields['name'];
			$place->description		= $fields['description'];
			$place->address			= $fields['address'];
			$place->open_time		= $fields['open_time'];
			$place->coordinates		= $fields['coordinates'];
			
			if($place->save())
			{
				\Response::redirect('places/edit/'.$id);
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