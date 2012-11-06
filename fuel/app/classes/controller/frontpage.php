<?php

	/**
	 * The Welcome Controller.
	 *
	 * A basic controller example.  Has examples of how to set the
	 * response body and status.
	 *
	 * @package  app
	 * @extends  Controller
	 */
class Controller_Frontpage extends Controller_Ines_Site
{


	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		$view = View::forge('default/index.smarty');
		$this->_tpl->set('body', $view);
		return $this->_tpl;// = View::forge('default/frontpage.smarty');
	}


}