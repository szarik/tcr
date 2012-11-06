<?php
namespace Tocorobimy\Model;

class Tocorobimy extends \Model
{

	/**
	 * Get categories from DB
	 *
	 * @param null $_categories
	 * @return mixed
	 */
	public static function get_categories($_categories = null)
	{
		$_query = \DB::select('id', 'nazwa')->from('kategorie_imprez');

		if ($_categories !== null) {
			$_query->where('id', 'IN', $_categories);
		}

		$_query = $_query->as_object()->execute();

		return $_query;
	}

}