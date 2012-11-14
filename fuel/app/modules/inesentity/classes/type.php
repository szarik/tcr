<?php

namespace InesEntity;
use \InesEntity\Model\Type as Model;

class Type
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
		if (!isset(Type::$_instance)) {
			Type::$_instance = new Type();
		}

		return Type::$_instance;
	}

	/**
	 * Get type object
	 *
	 * @param $_eid
	 * @return array|null
	 */
	public function get($_eid)
	{
		if ((int)$_eid === 0) {
			return null;
		}

		return Model::get($_eid);
	}

}