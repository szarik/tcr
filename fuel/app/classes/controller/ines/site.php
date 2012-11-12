<?php

/**
 * Global Boot Controller for all InesCMS sites
 */
class Controller_Ines_Site extends Controller
{
	/**
	 * Global view template
	 * @var string
	 */
	protected $_global_tpl = 'index';

	/**
	 * Action template template
	 * @var string
	 */
	protected $_tpl;

	/**
	 * Initializing assets, prepare View
	 */
	public function before()
	{
		// Load global view
		$this->_tpl = View::forge(ines::theme($this->_global_tpl));

		// Set layout global vars
		$this->_tpl->set('doctype', \Fuel\Core\Html::doctype(ines::configGet('doctype')), false);
	}

	/**
	 * Finalizing View, send global data from core and app to view
	 * @param $response
	 * @return mixed
	 */
	public function after($response)
	{
		// Css and js
		$this->_tpl->set('assets', \Fuel\Core\Asset::render('_default_'), false);
		$this->_tpl->set('assets_external', \Fuel\Core\Asset::render('external'), false);
		$this->_tpl->set('cssie', \Fuel\Core\Asset::render('ie'), false);

		// Cfg
		$this->_tpl->set('config', ines::configGet());
		$this->_tpl->set('theme', ines::configGet('theme', 'default'));

		// Return final view
		$this->_tpl = ines::hook('view_extend_after', $this->_tpl, $this->_tpl);
		
		// Load events form into template
		@\Controller_Events::action_add();
		@\Controller_Places::action_add();

		return new Response($this->_tpl, 400);
	}


}
