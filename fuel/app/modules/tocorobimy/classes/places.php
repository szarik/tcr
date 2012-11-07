<?php

namespace Tocorobimy;
use \Tocorobimy\Model\Tocorobimy as Model;


class Places
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
		if (!isset(Places::$_instance)) {
			Places::$_instance = new Places();
		}

		return Places::$_instance;
	}


	/**
	 * Get places list
	 */
	public function get($places = null)
	{


		if ($places === null) {
			// Get all categories if null
			return Model::get_places();

		} else {
			// Get specific categories if int or array of ints

			if (!is_array($places)) {
				$_places[] = (int)$places;
			} else {
				$_places = (array)$places;
			}

			if (empty($_places)) {
				return null;
			}

			return Model::get_places($_places);
		}
	}


}