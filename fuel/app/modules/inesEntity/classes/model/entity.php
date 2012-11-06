<?php
namespace InesEntity\Model;

class Entity extends \Model
{

	public static function get_cached_db_entity($_eid) {

		$_query = \DB::select('data', 'serialized')->from('entities_cache')->limit(1);
		$_query->where('eid', '=', $_eid)->where('expired', '>', time());
		$_query = $_query->as_object()->execute()->current();

		return $_query;

	}


	public static function find($_options, $_limit = null, $_offset = null)
	{

		/**
		$_query = \DB::select('e.*')->distinct()->from(array('entities', 'e'));
		$_query->join(array('fields_data', 'f0'), 'INNER')->on('f0.eid', '=', 'e.eid');
		$_query->join(array('fields_data', 'f1'), 'INNER')->on('f1.eid', '=', 'e.eid');
		$_query->where_open()->where('f0.name', '=', 'pole1')->where('f0.value', 'LIKE', '%o%')->where_close();
		$_query->where_open()->where('f1.name', '=', 'pole2')->where('f1.value', 'LIKE', '%o%')->where_close();
	*/

		/** SELECT where pole1 LIKE %o& AND pole2 LIKE %o% */
		$_query = \DB::select('e.*')->distinct()->from(array('entities', 'e'));

		$_query->join(array('fields_data', 'fd0'), 'INNER')->on('fd0.eid', '=', 'e.eid');
		$_query->join(array('fields', 'f0'), 'INNER')->on('f0.fid', '=', 'fd0.fid');
		$_query->where_open()->where('f0.name', '=', 'pole1')->where('fd0.value', 'LIKE', '%o%')->where_close();

		$_query->join(array('fields_data', 'fd1'), 'INNER')->on('fd1.eid', '=', 'e.eid');
		$_query->join(array('fields', 'f1'), 'INNER')->on('f1.fid', '=', 'fd1.fid');
		$_query->where_open()->where('f1.name', '=', 'pole2')->where('fd1.value', 'LIKE', '%o%')->where_close();

		$_query->where_open();
		$_query->where('e.status', '=', '1');
		$_query->where('f0.status', '=', '1');
		$_query->where('f1.status', '=', '1');
		$_query->where_close();


		echo $_query;
		return $_query;

	}

}