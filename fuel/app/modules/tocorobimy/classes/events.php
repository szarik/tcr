<?php

namespace Tocorobimy;
use \Tocorobimy\Model\Tocorobimy as Model;


class Events
{

	/**
	 * Class instance
	 * @var
	 */
	protected static $_instance;

	/**
	 * Get instance
	 *
	 * @static
	 * @return object
	 */
	public static function instance()
	{
		if (!isset(Events::$_instance)) {
			Events::$_instance = new Events();
		}

		return Events::$_instance;
	}


	/**
	 * Get events list
	 */
	public function get($categories = null)
	{
		if ($categories === null) {
			// Get all events if null
			return Model::get_events();

		} else {
			// Get specific events if int or array of ints

			if (!is_array($categories)) {
				$_categories[] = (int)$categories;
			} else {
				$_categories = (array)$categories;
			}

			if (empty($_categories)) {
				return null;
			}

			return Model::get_events($_categories);
		}
	}


}