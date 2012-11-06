<?php
namespace InesTools\Model;

class Model extends \Model
{

	/**
	 * Return founded modules in system.
	 *
	 * @static
	 * @param $status
	 * @return array|null
	 */
	public static function get_modules($status = -1)
	{

		if ($status >= 0) {
			$enabled = array();
			if ($_enabled_modules = \DB::select('module')->from('modules')->order_by('order', 'asc')->execute()->as_array())
				foreach ($_enabled_modules as $_enabled_module)
					$enabled[] = $_enabled_module['module'];
		}

		$_found_modules = array();
		if ($_modules_pathes = \Config::get('module_paths', false)) {
			foreach ($_modules_pathes as $_module_path) {
				foreach (scandir($_module_path) as $_module_directory)
					if (!is_file($_module_directory) && substr($_module_directory, 0, 1) != '.') {
						$_manifest_file = $_module_path . $_module_directory . '/manifest.xml';
						if (is_file($_manifest_file)) {
							$_found = \Format::forge(file_get_contents($_manifest_file), 'xml')->to_array();
							// enabled modules
							if (($status === 1 && in_array($_found['module']['code'], $enabled)) || ($status === 0 && !in_array($_found['module']['code'], $enabled) || ($status === -1))) {
								$_found_modules[] = $_found;
							}
						}
					}
			}
		}
		return (!empty($_found_modules)) ? $_found_modules : null;
	}

	/**
	 * Return all enabled modules in the system
	 * @static
	 * @return array|null
	 */
	public static function get_enabled_modules()
	{
		return self::get_modules(1);
	}

	/**
	 * Return all disabled modules in the system
	 * @static
	 * @return array|null
	 */
	public static function get_disabled_modules()
	{
		return self::get_modules(0);
	}


	/**
	 * Save configuration
	 * @static
	 * @return bool
	 */
	public static function save_configuration($_configuration)
	{
		if (!isset($_configuration) || !is_array($_configuration))
			return false;

		foreach ($_configuration as $_cfg_key => $_cfg_val) {
			$_set = array(
				'modified_time' => \Date::time()->get_timestamp(),
				'modified_author' => 0,
				'value' => (is_array($_cfg_val)) ? serialize($_cfg_val) : $_cfg_val
			);

			// Try to update existing config
			$result = \DB::update('data')->set($_set)->where('config', '=', $_cfg_key)->execute();

			// If cannot update, create new one record
			if ($result === 0) {
				$_set['config'] = $_cfg_key;
				\DB::insert('data')->set($_set)->execute();
			}
		}

		return true;
	}
}

?>