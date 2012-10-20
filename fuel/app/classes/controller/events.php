class Controller_Events extends \Controller_Template
{
	//list events
	function action_index()
	{
		
	}
	
	//add new event
	function action_add()
	{
		$fieldset = Fieldset::forge()->add_model('Model_Event');
		$form     = $fieldset->form();
		$form->add('submit', '', array('type' => 'submit', 'value' => 'Dodaj', 'class' => 'btn medium primary'));
		$this->template->set('content', $form->build(), false); //false will tell fuel not to convert the html tags to safe string
	}
}