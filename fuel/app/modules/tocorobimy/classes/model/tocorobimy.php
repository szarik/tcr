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
	public static function get_events($_categories = null, $_limit = 0, $_offset = 0)
	{
		$_query = \DB::select('*')->from('events');

		if ($_categories !== null) {
			$_query->where('category_id', 'IN', $_categories);
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
		$_query = \DB::select("*")->from('places');

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
	
	/**
	 * Get categories from DB
	 * 
	 * @return list (id,name) of categories
	 */
	public static function get_categories_list()
	{
		$_query = \DB::select('id', 'name')->from('categories');
		$result = \DB::select('id', 'name')->from('categories')->execute()->as_array('id', 'name');
		
		return $result;
	}
	
	/**
	 * Get number of events for category id
	 * 
	 * @param $category_id; when not set, number of all events is calculated
	 * @return int
	 */
	public static function get_number_of_events($category_id = null)
	{
		$_query = (isset($category_id)
			 ? $_query = \DB::select('*')->from('events')->where('category_id', $category_id)
			 : $_query = \DB::select('*')->from('events'));
		
		return count($_query->execute());
	}

	public static function get_events_for_filters($_categories, $_preferences)
	{
		$_query = \DB::select('*')->from('events');
		$where_used = false;
		
		if (!empty($_categories))
		{
			$_query->where('category_id', 'IN', $_categories);
			$where_used = true;
		}
		if (!empty($_preferences))
		{
			if( $where_used )
			{
				$_query->and_where('preferences', 'IN', $_preferences);
			}
			else 
			{
				$_query->where('preferences', 'IN', $_preferences);
			}
		}
		$_query->order_by('id', 'desc');
		
		$_query = $_query->as_object()->execute();
		return $_query;
	}
}
