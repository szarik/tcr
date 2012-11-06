<?php
namespace InesTools;
use \InesTools\Model\Model;

class Tools
{

	public static function _init()
	{

		// Site configuration
		self::_init_configuration();
		$locale = self::configGet('locale');
		\Date::display_timezone($locale['default_timezone']);

		// Module initialization
		self::_init_modules();

		// Engine start modules
		\Ines::hook('engine_start', null, null);
		/**
		$params = array('params');
		$return_val = array('returnVal');
		\Ines::dump(\Ines::hook('engine_start', $params, $return_val));
		 * */

		//self::dump(self::configGet());

		// Prepare config
		//\InesConfig::instance();

		// Load ines tools config
		//\Config::load('inesTools::tools', 'ines_tools');


		//if (\Config::get('ines_tools.load_jquery') !== false)
		//	\Asset::js('jquery-' . \Config::get('ines_tools.load_jquery') . '.js', array(), 'ines_external');

		// Add default javascripts
		$_var = \Config::get('ines_tools.load_js');
		if (is_array($_var) && !empty($_var))
			foreach ($_var as $file => $pack)
				if (is_numeric($file)) {
					\Asset::js($pack . '.js', array(), 'ines_external');
				} else {
					\Asset::js($file . '.js', array(), $pack);
				}

		// Add default javascripts
		$_var = \Config::get('ines_tools.load_css');
		if (is_array($_var) && !empty($_var))
			foreach ($_var as $file => $pack)
				if (is_numeric($file)) {
					\Asset::css($pack . '.css', array(), 'ines_external');
				} else {
					\Asset::css($file . '.css', array(), $pack);
				}

	}

	/**
	 * Initializing all defined and enabled modules in system
	 *
	 * @static
	 */
	private static function _init_modules()
	{
		$_loaded_modules = Model::get_enabled_modules();
		if (isset($_loaded_modules) && !empty($_loaded_modules))
			foreach ($_loaded_modules as $_module) {
				\Module::load($_module['module']['code']);
				if (isset($_module['autoload']['class'])) {
					if (is_array($_module['autoload']['class']) && !empty($_module['autoload']['class'])) {
						foreach ($_module['autoload']['class'] as $_loaded_class)
							eval("new \\" . $_module['module']['code'] . "\\" . $_loaded_class . ";");
					} else {
						eval("new \\" . $_module['module']['code'] . "\\" . $_module['autoload']['class'] . ";");
					}
				}
			}
	}

	/**
	 * @static
	 *
	 */
	private static function _init_configuration()
	{
		// Database configuration
		$_config = \DB::select('config', 'value')->from('data')->execute();
		foreach ($_config as $_val)
			self::configSet($_val['config'], $_val['value']);
	}

	/**
	 * Helper
	 * Set config value
	 * @static
	 * @param $key
	 * @param $val
	 * @param bool $overwrite
	 * @return mixed
	 */
	public static function configSet($key, $val, $overwrite = false)
	{
		return \InesTools\Config::instance()->set($key, $val, $overwrite);
	}

	/**
	 * Helper
	 * Get config value
	 * @static
	 * @param null $key
	 * @param null $default
	 * @return mixed
	 */
	public static function configGet($key = null, $default = null)
	{
		if ($key !== null)
			return \InesTools\Config::instance()->get($key, $default);
		else
			return \InesTools\Config::instance()->get_all();
	}

	/**
	 * Helper
	 * Save config value
	 * @static
	 * @param null $_configuration
	 * @return bool
	 */
	public static function configSave($_configuration = null)
	{
		if (!isset($_configuration) || !is_array($_configuration) || $_configuration === null)
			$_configuration = self::configGet();

		return \InesTools\Config::instance()->save($_configuration);
	}

	/**
	 * Helper
	 * Delete config value
	 * @static
	 * @param $_configuration
	 * @return bool
	 */
	public static function configRemove($_configuration)
	{
		return \InesTools\Config::instance()->remove($_configuration);
	}

	/**
	 * Hook register
	 * @static
	 * @param $hook
	 * @param $function
	 * @param $class
	 * @return mixed
	 */
	public static function registerHook($hook, $function, $class)
	{
		$hooks = \Ines::configGet('hooks');
		$hooks[$hook][] = array('function' => $function, 'class' => $class);
		return \Ines::configSet('hooks', $hooks, true);
	}

	/**
	 * Hook
	 * @static
	 * @param $hook
	 * @param $params
	 * @param $return
	 * @return mixed
	 */
	public static function hook($hook, $params, $return)
	{
		$hooks = \Ines::configGet('hooks');
		$hooks = (isset($hooks[$hook])) ? $hooks[$hook] : null;

		if (!isset($hooks))
			return $return;

		foreach ($hooks as $hook)
			eval('$return = \\' . $hook['class'] . '::' . $hook['function'] . '($params,$return);');

		return $return;
	}


	/**
	 * Load file from defined theme folder and automatically add .smarty extension
	 *
	 * @static
	 * @param $file
	 * @return string
	 */
	public static function theme($file)
	{
		return self::configGet('theme', 'default') . '/' . $file . '.smarty';
	}

	/**
	 * Debug requested data.
	 * Please use InesTools::dump helper instead /InesTools/Tools::dump()
	 *
	 * @static
	 * @param $var
	 * @param null $var_name
	 * @param null $indent
	 * @param null $reference
	 * @param int $level
	 */
	public static function dump($var, $var_name = null, $indent = null, $reference = null, $level = 0)
	{

		$backtrace = debug_backtrace();
		$callee = $backtrace[1];
		if (!isset($callee['file']))
			$callee = $backtrace[0];

		$callee['file'] = \Fuel::clean_path($callee['file']);

		$do_dump_indent = "<span style='color:#666666;'>|</span> &nbsp;&nbsp; ";
		$reference = $reference . $var_name;
		$keyvar = 'the_do_dump_recursion_protection_scheme';
		$keyname = 'referenced_object_name';

		// file and line
		if ($level == 0) {
			echo '<div style="background: #EEE !important; border:1px solid #666; padding:10px;">';
			echo '<h1 style="border-bottom: 1px solid #CCC; padding: 0 0 5px 0; margin: 0 0 5px 0; font: bold 120% sans-serif;">' . $callee['file'] . ' @ line: ' . $callee['line'] . '</h1>';
		}

		// So this is always visible and always left justified and readable
		echo "<div style='text-align:left; background-color:white; font: 100% monospace; color:black;'>";

		if (function_exists('xdebug_is_enabled')) {
			var_dump($var);
		} else {

			if (is_array($var) && isset($var[$keyvar])) {
				$real_var = & $var[$keyvar];
				$real_name = & $var[$keyname];
				$type = ucfirst(gettype($real_var));
				echo "$indent$var_name <span style='color:#666666'>$type</span> = <span style='color:#e87800;'>&amp;$real_name</span><br>";
			} else {
				$var = array($keyvar => $var, $keyname => $reference);
				$avar = & $var[$keyvar];

				$type = ucfirst(gettype($avar));
				if ($type == "String")
					$type_color = "<span style='color:green'>";
				elseif ($type == "Integer")
					$type_color = "<span style='color:red'>"; elseif ($type == "Double") {
					$type_color = "<span style='color:#0099c5'>";
					$type = "Float";
				} elseif ($type == "Boolean")
					$type_color = "<span style='color:#92008d'>"; elseif ($type == "NULL")
					$type_color = "<span style='color:black'>";

				if (is_array($avar)) {
					$count = count($avar);
					echo "$indent" . ($var_name ? "$var_name => " : "") . "<span style='color:#666666'>$type ($count)</span><br>$indent(<br>";
					$keys = array_keys($avar);

					foreach ($keys as $name) {
						$value = & $avar[$name];
						self::dump($value, "['$name']", $indent . $do_dump_indent, $reference, $level + 1);
					}
					echo "$indent)<br>";
				} elseif (is_object($avar)) {
					echo "$indent$var_name <span style='color:#666666'>$type</span><br>$indent(<br>";
					foreach ($avar as $name => $value)
						self::dump($value, "$name", $indent . $do_dump_indent, $reference, $level + 1);
					echo "$indent)<br>";
				} elseif (is_int($avar))
					echo "$indent$var_name = <span style='color:#666666'>$type(" . strlen($avar) . ")</span> $type_color" . htmlspecialchars($avar) . "</span><br>"; elseif (is_string($avar))
					echo "$indent$var_name = <span style='color:#666666'>$type(" . strlen($avar) . ")</span> $type_color\"" . htmlspecialchars($avar) . "\"</span><br>"; elseif (is_float($avar))
					echo "$indent$var_name = <span style='color:#666666'>$type(" . strlen($avar) . ")</span> $type_color" . htmlspecialchars($avar) . "</span><br>"; elseif (is_bool($avar))
					echo "$indent$var_name = <span style='color:#666666'>$type(" . strlen($avar) . ")</span> $type_color" . ($avar == 1 ? "TRUE" : "FALSE") . "</span><br>"; elseif (is_null($avar))
					echo "$indent$var_name = <span style='color:#666666'>$type(" . strlen($avar) . ")</span> {$type_color}NULL</span><br>"; else echo "$indent$var_name = <span style='color:#666666'>$type(" . strlen($avar) . ")</span> " . htmlspecialchars($avar) . "<br>";

				$var = $var[$keyvar];
			}

		}

		echo "</div>";

		if ($level == 0)
			echo '</div>';
	}

}