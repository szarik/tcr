<?php
class Controller_Miejsca extends \Controller_Ines_Site
{
	//list places
	public function action_index()
	{
		$view = View::forge('default/tabs.smarty');
		$this->_tpl->set('body', $view);
		return $this->_tpl;// = View::forge('default/frontpage.smarty');
	}
	
	public function action_miejsce($id_miejsce)
	{

		$view = View::forge('default/lokale/lokale.smarty');
		$this->_tpl->set('body', $view);
		$this->_tpl->set('id_miejsce', $id_miejsce);
		//Przyk³adowa SQL'ka
		$z = \DB::query("SELECT * FROM events WHERE place_id = $id_miejsce and date_start >= NOW()")->as_object()->execute();
		//\Ines::dump($z);
		$this->_tpl->set('inne_wydarzenie',$z, false);
		return $this->_tpl;// = View::forge('default/frontpage.smarty');
		
	}
	
	//add new place
	function action_dodaj()
	{
		$fieldset = Fieldset::forge()->add_model('Model_Place')->repopulate();
		//$form = $fieldset->form();
		//$form->add('submit', '', array('type' => 'submit', 'value' => 'Dodaj', 'class' => 'btn medium primary'));
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
			$html = "<ul>";
			$error_list = $fieldset->validation()->error();
			foreach($error_list as $error)
			{
				$html .= "<li>".$error."</li>";
			}
			$html .= "</ul>";
			
			if(count($error_list) > 0)
			{
				$html .= "<script type=\"text/javascript\">$(function(){show_places_popup();});</script>";
			}
			
			$this->_tpl->set('place_messages', $html, false);
		}
		//$this->_tpl->set('form_place', $form->build(), false);
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