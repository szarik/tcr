<?php

class Controller_Portfolio extends Controller_Ines_Site
{

	private $_tpl_index = 'portfolio/index';

	public function action_index()
	{
		// Header
		$this->_tpl->set('title', 'Portfolio');
		$this->_tpl->set('description', 'Zrealizowane przeze mnie projekty, zarówno stron internetowych, szablonów witryn czy różnego rodzaju grafiki.');
		$this->_tpl->set('keywords', 'portfolio, grzesiecki portfolio, moje realizacje, przykłądowe realizacje');

		$_portfolio[] = \Html::anchor('portfolio/web/efektdc', \Html::img('assets/img/portfolio/efektdc/thumbs/150x150.png', array('title' => 'W oznaczeniach liczy się efekt', 'alt' => 'W oznaczeniach liczy się efekt')));
		$_portfolio[] = \Html::anchor('portfolio/web/forum_wks', \Html::img('assets/img/portfolio/forum_wks/thumbs/150x150.png', array('title' => 'Forum Kibiców Śląska Wrocław', 'alt' => 'Forum Kibiców Śląska Wrocław')));
		$_portfolio[] = \Html::anchor('portfolio/web/teleton', \Html::img('assets/img/portfolio/teleton/thumbs/150x150.png', array('title' => 'Centrale telefoniczne, telefony', 'alt' => 'Centrale telefoniczne, telefony')));
		$_portfolio[] = \Html::anchor('portfolio/web/spsg4', \Html::img('assets/img/portfolio/spsg4/thumbs/150x150.png', array('title' => 'Stowarzyszenie przyjaciół szkoły G4', 'alt' => 'Stowarzyszenie przyjaciół szkoły G4')));
		$_portfolio[] = \Html::anchor('portfolio/web/surin', \Html::img('assets/img/portfolio/surin/thumbs/150x150.png', array('title' => 'Naprawa biżuterii srebrnej i sztucznej', 'alt' => 'Naprawa biżuterii srebrnej i sztucznej')));
		$_portfolio[] = \Html::anchor('portfolio/web/zlosnica', \Html::img('assets/img/portfolio/zlosnica/thumbs/150x150.png', array('title' => 'Portal dla kobiet inny niż inne', 'alt' => 'Portal dla kobiet inny niż inne')));

		$_portfolio[] = \Html::anchor('portfolio/web/finalkuchara', \Html::img('assets/img/portfolio/finalkuchara/thumbs/150x150.png', array('title' => 'Mistrzostwa Polski U14', 'alt' => 'Mistrzostwa Polski U14')));
		$_portfolio[] = \Html::anchor('portfolio/web/radaksieze', \Html::img('assets/img/portfolio/radaksieze/thumbs/150x150.png', array('title' => 'Rada osiedla Księżę, Wrocław', 'alt' => 'Rada osiedla Księżę, Wrocław')));
		$_portfolio[] = \Html::anchor('portfolio/graph/animalbook', \Html::img('assets/img/portfolio/animalbook/thumbs/150x150.png', array('title' => 'Animalbook', 'alt' => 'Animalbook')));
		$_portfolio[] = \Html::anchor('portfolio/graph/hogwartrpg', \Html::img('assets/img/portfolio/hogwartrpg/thumbs/150x150.png', array('title' => 'Hogwart-rpg.net', 'alt' => 'Hogwart-rpg.net')));
		$_portfolio[] = \Html::anchor('portfolio/graph/eurografik_v1', \Html::img('assets/img/portfolio/eurografik_v1/thumbs/150x150.png', array('title' => 'Eurografik, wersja 1', 'alt' => 'Eurografik, wersja 1')));
		$_portfolio[] = \Html::anchor('portfolio/graph/eurografik_v2', \Html::img('assets/img/portfolio/eurografik_v2/thumbs/150x150.png', array('title' => 'Eurografik, wersja 2', 'alt' => 'Eurografik, wersja 2')));

		$_portfolio[] = \Html::anchor('portfolio/graph/eurografik_v3', \Html::img('assets/img/portfolio/eurografik_v3/thumbs/150x150.png', array('title' => 'Eurografik, wersja 3', 'alt' => 'Eurografik, wersja 3')));
		$_portfolio[] = \Html::anchor('portfolio/graph/pwrtheme', \Html::img('assets/img/portfolio/pwrtheme/thumbs/150x150.png', array('title' => 'Politechnika Wrocławska', 'alt' => 'Politechnika Wrocławska')));
		$_portfolio[] = \Html::anchor('portfolio/graph/gcms_login', \Html::img('assets/img/portfolio/gcms_login/thumbs/150x150.png', array('title' => 'Panel logowania Gcms', 'alt' => 'Panel logowania Gcms')));


		/** NEW ENTITY OBJECT */
		$e = new \InesEntity\object\Entity();
		//ines::dump($e);

		/** GET TYPE OBJECT FOR INT */
		$o = \InesEntity\Manage::instance()->get_type_object(1);
		ines::dump($o);

		/** GET ENTITY FOR SPECIFIC INT */
		$n = \InesEntity\Manage::instance()->get_entity(1);
		ines::dump($n);

		/** SEARCH ENTITY  */
		$t = \InesEntity\Manage::instance();
		$s[] = array('f' => 'pole1', 'o' => 'LIKE', 'v' => '%o%');
		$s[] = array('f' => 'pole2', 'o' => 'LIKE', 'v' => '%o%');
		$q = $t->find_entity($s);
		//ines::dump($q);

		// Load view
		$view = View::forge(ines::theme($this->_tpl_index));
		$view->set('portfolio', $_portfolio, false);
		return $this->_tpl->set('body', $view);
	}


}