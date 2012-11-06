<?php
namespace InesTools;

class Config
{

	/**
	 * Configuration array
	 * @var array
	 */
	private $_config;

	/**
	 * Configuration instance
	 * @var
	 */
	protected static $_instance;

	/**
	 * Get configuration instance
	 *
	 * @static
	 * @return mixed
	 */
	public static function instance()
	{
		if (!isset(Config::$_instance))
			Config::$_instance = new Config();

		return Config::$_instance;
	}


	/**
	 * Set new configuration.
	 *
	 * @param $key
	 * @param $val
	 * @param bool $overwrite
	 * @return bool
	 * @throws \Exception
	 */
	public function set($key, $val, $overwrite = false)
	{
		if (isset($this->_config[$key]) && $overwrite === false)
			throw new \Exception("Cannot overwrite configuration settings.");

		$array = @unserialize($val);
		if ($array === false && $val !== 'b:0;')
			$this->_config[$key] = (is_array($val)) ? $val : trim($val);
		else
			$this->_config[$key] = $array;

		return true;
	}

	/**
	 * Get configuration
	 *
	 * @param $key
	 * @param null $default
	 * @return null
	 */
	public function get($key, $default = null)
	{
		if (is_array($key) && !empty($key)) {
			$_return_array = array();
			foreach ($key as $single) {
				if (isset($this->_config[$single]))
					$_return_array[$single] = $this->_config[$single];
				else
					$_return_array[$single] = $default;
			}
			return $_return_array;
		}

		if (isset($this->_config[$key]))
			return $this->_config[$key];
		else
			return $default;

	}

	/**
	 * Save configuration in DB
	 */
	public function save($_configuration)
	{
		return \InesTools\Model\Model::save_configuration($_configuration);
	}


	/**
	 * Return whole configuration
	 * @return array
	 */
	public function get_all()
	{
		return $this->_config;
	}


}
