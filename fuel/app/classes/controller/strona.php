<?php
class Controller_Strona extends Controller_Ines_Site
{
	public function action_regulamin()
	{
		$view = '<div class="round_frame">';
		$view .= View::forge('default/footer/regulamin.smarty');
		$view .= '</div>';
		$this->_tpl->set('body', $view, false);
	
		return $this->_tpl;
	}
	
	public function action_prawa_autorskie()
	{
		$view = '<div class="round_frame">';
		$view .= View::forge('default/footer/prawa_autorskie.smarty');
		$view .= '</div>';
		$this->_tpl->set('body', $view, false);
	
		return $this->_tpl;
	}
	
	public function action_kontakt()
	{
		$view = '<div class="round_frame">';
		$view .= View::forge('default/footer/kontakt.smarty');
		$view .= '</div>';
		$this->_tpl->set('body', $view, false);
	
		return $this->_tpl;
	}
	
	public function action_zglos_blad()
	{
		$view2 = '<div class="round_frame">';
		$view = View::forge('default/footer/zglos_blad.smarty');
		$view3 = '</div>';
		
		$report_form['open'] = \Form::open(array('action' => 'strona/zglos_blad'));
		$report_form['name'] = \Form::input('name', \Input::post('name', ''), array('class' => 'report_page_field', 'required' => 'true'));
		$report_form['phone'] = \Form::input('phone', \Input::post('phone', ''), array('class' => 'report_page_field', 'required' => 'false'));
		$report_form['email'] = \Form::input('email', \Input::post('email', ''), array('class' => 'report_page_field', 'required' => 'true'));
		$report_form['message'] = \Form::textarea('message', \Input::post('message', ''), array('class' => 'report_page_message', 'required' => 'true'));
		$report_form['submit'] = \Form::submit('submit', 'Zgłoś błąd', array('type' => 'submit', 'class' => 'btn'));
		$report_form['close'] = \Form::close();
		$view->set('report_form', $report_form, false);
		
		if( \Input::post('submit') )
		{
			$errors = "";
			
			//	validation
			if( !$this->isValidEmail(\Input::post('email')) )
			{
				$errors .= "<li>Adres e-mail jest nieprawidłowy</li>";
			}
			if( trim(\Input::post('message')) == "" )
			{
				$errors .= "<li>Wiadomość nie może być pusta</li>";
			}
			else if( strlen(trim(\Input::post('message'))) < 10 )
			{
				$errors .= "<li>Wiadomość musi mieć co najmniej 10 znaków</li>";
			}
			//TODO: phone, name
			/*
			if( \Input::post('name')->nie_zawiera_tylko_liter[regex?] )
			{
				$errors .= "<li>Imię i nazwisko jest nieprawidłowe</li>";
			}
			if( \Input::post('phone')->nie_zawiera_tylko_cyfr_i_myslnikow[regex?] )
			{
				$errors .+ "<li>Telefon jest nieprawidłowy. Dopuszczalne są tylko cyfry, odsepy i myślniki</li>";
			}
			*/
			
			//	actions
			if( !empty($messages) )
			{
				$errors = '<ul>' . $messages . '</ul>';
				$view->set('report_page_messages', $errors, false);
			}
			else
			{
				$email = \Input::post('email');
				$message = 'FROM: ' . $email . '<br/><br/>' . \Input::post('message');
				
				$email = Email::forge();
				$email->from('aaaa', 'Johnny B');
				$email->subject('Zgłoszenie błędu');
				$email->html_body($message);
				$email->to('tocorobimy.zgloszenia@gmail.com', 'Konrad Hanus');
				$email->send();
				\Response::redirect('/');
			}
		}
	
		$this->_tpl->set('body', $view2.$view.$view3, false);
		return $this->_tpl;
	}
	
	public function action_jak_to_dziala()
	{
		$view = '<div class="round_frame">';
		$view .= View::forge('default/footer/jak_to_dziala.smarty');
		$view .= '</div>';
		$this->_tpl->set('body', $view, false);
	
		return $this->_tpl;
	}
	
	private function isValidEmail($email)
	{
		return preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email);
	}
}