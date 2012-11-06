<?php

namespace InesEntity;

use \InesEntity\Type;
use \InesEntity\Model\Entity as Model;
use \InesEntity\Object\Entity;


class Manage
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
		if (!isset(Manage::$_instance)) {
			Manage::$_instance = new Manage();
		}

		return Manage::$_instance;
	}

	/**
	 * Create new constructor of entity manager
	 */
	public static function _init()
	{
		Manage::instance();
	}


	public function get_entity($_entity_id, $_force = false)
	{

		$_eid = (int)$_entity_id;


		if ($_eid === 0) {
			return null;
		}

		// get entity from cache
		$_entity_cached = Model::get_cached_db_entity($_eid);
		return $_entity_cached;

	}


	/**
	 * Get type object of specific entity or entities id
	 *
	 * @param $entity
	 * @return object|null
	 */
	public function get_type_object($entity)
	{
		if (is_int($entity)) {
			// select if int
			return Type::instance()->get($entity);
		} else if (is_array($entity)) {
			// select if array of int
			foreach ($entity as $e) {
				if ((int)$e > 0) {
					$_new[] = (int)$e;
				}
			}

			if (!empty($_new)) {
				return Type::instance()->get($_new);
			}
		} else if ($entity instanceof Entity) {
			// select if entity object
			return Type::instance()->get($entity->getType());
		}
		return null;
	}

	/**
	 * Find entity by specific cases
	 *
	 * [n] => array(
	 *    'f' => 'field name',
	 *    'o' => 'operator',
	 *    'v' => 'value'
	 * )
	 *
	 * @param $cases
	 */
	public function find_entity($cases)
	{
		if (is_array($cases) && !empty($cases)) {
			return Model::find($cases);
		} else {
			return null;
		}
	}

}