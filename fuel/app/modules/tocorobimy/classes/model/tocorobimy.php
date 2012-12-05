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
	public static function get_number_of_events($events, $category_id = null)
	{
// 		$_query = (isset($category_id)
// 			 ? $_query = \DB::select('*')->from('events')->where('category_id', $category_id)
// 			 : $_query = \DB::select('*')->from('events'));
// 		return count($_query->execute());

		$counter = 0;
		if($category_id != null)
		{
			foreach($events as $event)
				if($event->category_id == $category_id)
					$counter++;
		}
		else 
		{
			$counter = count($events);
		}
		
		return $counter;
	}

	public static function get_events_for_filters($_categories, $_preferences, $_prices, $_dates)
	{
		$_query = \DB::select('events.id', 'place_id', 'events.name', 'description', 'date_end', 'preferences', 'periodicity', 'coordinates', 'visible', 'events.date_created', 'date_start', 'events.date_modified', 'link', 'link_photo', 'link_movie', 'category_id')->from('events')->join('categories')->on('events.category_id', '=', 'categories.id');
		
		if (!empty($_categories))
		{
			$_query->where(\DB::expr('LOWER(categories.name)'), 'IN', $_categories);
		}
		if (!empty($_dates))
		{
			$_query->where_open();
			foreach($_dates as $date)
			{
				//	support only for date names at them moment
				$_query->or_where(\DB::expr('CAST(date_start AS DATE)'), '=', \Tocorobimy\Model\Tocorobimy::datename_to_date(strtolower($date)));
			}
			$_query->where_close();
		}
		else
		{
			//	all from today inclusive
			$_query->where(\DB::expr('CAST(date_start AS DATE)'), '>=', date("Y-m-d"));
		}
		if (!empty($_prices))
		{
			$_query->join('events2prices', 'left')->on('events.id', '=', 'events2prices.event_id');
			
			$_query->where_open();
			foreach($_prices as $price)
			{
				$price_splitted = @split('-', $price);
				$_query->or_where('value', 'between', array(0, $price_splitted[1]));
			}
			$_query->where_close();
		}
		if (!empty($_preferences))
		{
			$_query->where_open();
			foreach($_preferences as $preference)
			{
				$_query->or_where('preferences', 'like', '%'.$preference.'%');
			}
			$_query->where_close();
		}
		
		$_query->order_by('events.id', 'desc');
		
		$_query = $_query->as_object()->execute();
		return $_query;
	}

	private static function datename_to_date($_name)
	{
		switch($_name)
		{
			case "dzis":
				return date("Y-m-d");
			case "jutro":
				$tomorrow = mktime(0, 0, 0, date("m"), date("d")+1, date("y"));
				return date("Y-m-d", $tomorrow);
			case "pojutrze":
				$day_after_tomorrow = mktime(0, 0, 0, date("m"), date("d")+2, date("y"));
				return date("Y-m-d", $day_after_tomorrow);
			default:
				return date("Y-m-d");
				break;
		}
	}
}
