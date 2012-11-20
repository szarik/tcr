<?php
namespace Tocorobimy\Model;

class Tocorobimy extends \Model
{
	
	 /**
	 * Get events from DB
	 *
	 * @param null $_events
	 * @return mixed
	 */
	public static function get_events($_events = null, $_limit = 0, $_offset = 0)
	{
		$_query = \DB::select('*')->from('events');

		if ($_events !== null) {
			$_query->where('id', 'IN', $_events);
		}
		$_query->order_by('id', 'desc');
		
		if ((int)$_limit > 0) {
			$_query->limit((int)$_limit);
		}

		if ((int)$_offset > 0) {
			$_query->offset((int)$_offset);
		}

		$_query = $_query->as_object()->execute();

		return $_query;
	}
	
	/**
	 * Get categories from DB
	 *
	 * @param null $_categories
	 * @return mixed
	 */
	public static function get_categories($_categories = null, $_limit = 0, $_offset = 0)
	{
		$_query = \DB::select('id', 'name')->from('categories');

		if ($_categories !== null) {
			$_query->where('id', 'IN', $_categories);
		}

		if ((int)$_limit > 0) {
			$_query->limit((int)$_limit);
		}

		if ((int)$_offset > 0) {
			$_query->offset((int)$_offset);
		}

		$_query = $_query->as_object()->execute();

		return $_query;
	}


	/**
	 * Get places from DB
	 *
	 * @param null $_categories
	 * @return mixed
	 */
	public static function get_places($_places = null, $_limit = null, $_offset = null)
	{
		$_query = \DB::select("*")->from('tcr_lokale');

		if ($_places !== null) {
			$_query->where('id', 'IN', $_places);
		}

		if ((int)$_limit > 0) {
			$_query->limit((int)$_limit);
		}

		if ((int)$_offset > 0) {
			$_query->offset((int)$_offset);
		}

		$_query = $_query->as_object()->execute();

		return $_query;
	}

}