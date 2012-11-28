<?php
class Controller_Wydarzenie extends Controller_Ines_Site
{
	
	function action_index()
	{
		$view = View::forge('default/tabs.smarty');
		$this->_tpl->set('body', $view);
		
		return $this->_tpl;// = View::forge('default/frontpage.smarty');
	}
	
	
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
		
		$report_form['open'] = \Form::open(array('action' => 'strona/send_report'));
		$report_form['email'] = \Form::input('email', \Input::post('email', ''), array('class' => 'report_page_mail', 'required' => 'true'));
		$report_form['message'] = \Form::textarea('message', \Input::post('email', ''), array('class' => 'report_page_message', 'required' => 'true'));
		$report_form['submit'] = \Form::button('submit', 'Zgłoś błąd', array('type' => 'submit', 'class' => 'btn'));
		$report_form['close'] = \Form::close();
		$view->set('report_form', $report_form, false);
	
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
	
	public function action_send_report()
	{
		//	Email:  tocorobimy.zgloszenia@gmail.com, pwd: 123ToCoRobimy!@#
		if( isValidEmail(/*TODO:*/) )
		{
			//TODO
		}
		$this->_tpl->set('body', $view, false);
	
		return $this->_tpl;
	}
	
	private function isValidEmail($email)
	{
		return preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email);
	}
}