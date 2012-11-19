<?php
class Controller_Strona extends Controller_Ines_Site
{
	public function action_regulamin()
	{
		$view = View::forge('default/footer/regulamin.smarty');
		$this->_tpl->set('body', $view);
	
		return $this->_tpl;
	}
	
	public function action_prawa_autorskie()
	{
		$view = View::forge('default/footer/prawa_autorskie.smarty');
		$this->_tpl->set('body', $view);
	
		return $this->_tpl;
	}
	
	public function action_kontakt()
	{
		$view = View::forge('default/footer/kontakt.smarty');
		$this->_tpl->set('body', $view);
	
		return $this->_tpl;
	}
	
	public function action_zglos_blad()
	{
		$view = View::forge('default/footer/zglos_blad.smarty');
		$this->_tpl->set('body', $view);
	
		return $this->_tpl;
	}
}