<?php

namespace InesEntity;

abstract class Object
{

	/**
	 * Object unique id
	 * @var
	 */
	protected $_eid = 0;

	/**
	 * Object type id
	 * @var
	 */
	protected $_type = null;

	/**
	 * Object status
	 * @var
	 */
	protected $_status;

	/**
	 * Object title
	 *
	 * @var
	 */
	protected $_title;

	/**
	 * Object description
	 *
	 * @var
	 */
	protected $_description;

	/**
	 * Number of comments for object
	 *
	 * @var int
	 */
	protected $_comments = 0;

	/**
	 * Return entity type
	 *
	 * @return int
	 */
	public function getType()
	{
		return (int)$this->_type;
	}

}