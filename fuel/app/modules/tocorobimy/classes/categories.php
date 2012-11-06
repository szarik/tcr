<?php

namespace Tocorobimy;
use \Tocorobimy\Model\Tocorobimy as Model;


class Categories
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
		if (!isset(Categories::$_instance)) {
			Categories::$_instance = new Categories();
		}

		return Categories::$_instance;
	}


	/**
	 * Get categories list
	 */
	public function get($events = null)
	{


		if ($events === null) {
			// Get all categories if null
			return Model::get_categories();

		} else {
			// Get specific categories if int or array of ints

			if (!is_array($events)) {
				$_events[] = (int)$events;
			} else {
				$_events = (array)$events;
			}

			if (empty($_events)) {
				return null;
			}

			return Model::get_categories($_events);
		}
	}


}