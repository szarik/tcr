<?php

	namespace InesGmap;

	class Map extends Mapview
	{
		/**
		 * Container
		 * @var
		 */
		protected $_container;

		/**
		 * @var
		 */
		protected $_js;

		/**
		 * Current map unique id
		 * @var
		 */
		protected $_id;

		/**
		 * Global class name for all elements contains map
		 * @var string
		 */
		protected $_gmap_area = 'inesgmap_area';

		/**
		 * All geocodes for map
		 * @var array
		 */
		protected $_geocode = array();
		protected $_marker = array();

		/**
		 * Google Map options
		 * @see https://developers.google.com/maps/documentation/javascript/reference#MapOptio
		 * @var array
		 */
		protected $_mapoptions = array('zoom' => 13, 'center' => 'new google.maps.LatLng(53.41935400090768, 14.58160400390625)', 'mapTypeId' => 'google.maps.MapTypeId.ROADMAP');

		/**
		 * Raw code for gmaps
		 * @var
		 */
		protected $_raw;

		/**
		 * Create a new Google Map
		 *
		 * @see https://developers.google.com/maps/documentation/javascript/reference#MapOptions
		 * @param null $id
		 * @param null $container
		 * @param array $options
		 */
		public function __construct($id = null, $container = null, $options = array())
		{
			$this->setId(($id !== null) ? $id : (string) \Str::random('numeric', 6));
			$this->setContainer(($container !== null) ? $container : (string) \Str::random('alpha', 8));

			if ($options !== null) {
				$this->setOptions($options);
			}
		}

		/**
		 * Set different map ID
		 *
		 * @param $id
		 * @return bool
		 */
		public function setId($id)
		{

			if (is_string($id) && strlen(trim($id)) > 0) {
				$this->_id = (string) $id;
				return true;
			}

			return false;

		}

		/**
		 * Set container name
		 *
		 * @param $name
		 */
		public function setContainer($name)
		{
			$this->_container = (string) $name;
		}

		/**
		 * Set zoom level
		 *
		 * @param $name
		 */
		public function setZoom($zoom)
		{
			$this->_zoom = (int) $zoom;
		}

		/**
		 * Get container name
		 */
		public function getContainer()
		{
			return (string) $this->_container;
		}

		/**
		 * Setting Google Map options
		 *
		 * @see https://developers.google.com/maps/documentation/javascript/reference#MapOptions
		 * @param $opt
		 */
		public function setOptions($opt, $overwrite = true)
		{
			if (is_array($opt) && !empty($opt)) {

				$_options = array();

				foreach ($opt as $k => $o) {
					$_options[(string) $k] = trim((string) $o);
				}

				if ($overwrite === true) {
					$this->_mapoptions = array_merge((array) $this->_mapoptions, (array) $_options);
				} else {
					$this->_mapoptions = array_merge((array) $_options, (array) $this->_mapoptions);
				}
			}
		}

		public function setRaw($code)
		{
			$code = str_replace('<script type="text/javascript">', '', $code);
			$code = str_replace('</script>', '', $code);
			$this->_raw = $code;
		}

		/**
		 * Get container id
		 */
		public function getId()
		{
			return (string) $this->_id;
		}


		public function getOptions($options)
		{
			return null;
		}

		/**
		 *  Create new geocoder
		 *
		 * @see https://developers.google.com/maps/documentation/javascript/reference#Geocoder
		 * @see https://developers.google.com/maps/documentation/javascript/reference#GeocoderRequest
		 * @see https://developers.google.com/maps/documentation/javascript/reference#GeocoderResult
		 * @see https://developers.google.com/maps/documentation/javascript/reference#GeocoderStatus
		 * @param $_id
		 * @param $_options
		 * @param null $_callback
		 * @return bool
		 */
		public function addGeocode($_id, $_options, $_callback = null)
		{
			$_id = trim((string) \Inflector::friendly_title($_id, '_'));

			if (!isset($_options) || !is_array($_options) || empty($_options) || !isset($_id) || strlen($_id) <= 0) {
				return false;
			}

			// Prepare options array
			$this->_geocode[$_id]['options'] = $_options;

			// Set default callback function
			if ($_callback !== null) {
				if (is_array($_callback)) {
					$this->_geocode[$_id]['callback'] = (string) $_callback['callback'];
					$this->_geocode[$_id]['callback_code'] = (string) $_callback['code'];
				} else {
					$this->_geocode[$_id]['callback'] = (string) $_callback;
				}
			}

			return true;
		}

		/**
		 * @param $cords
		 */
		public function addMarker($cords) {
			$this->_marker[] = array('cords' => $cords);
		}

		/**
		 * Get javascript code
		 *
		 * @param bool $_return
		 * @return string
		 */
		public function getScript($_return = false)
		{
			// Set javascript header
			$this->_js = '<script type="text/javascript">' . $this->_js() . '</script>';
			$this->_js = new \Response($this->_js);
			$this->_js->set_header('Content-Type', 'text/javascript; charset=utf-8');

			// Return value
			if ($_return === true) {
				return $this->_js;
			} else {
				echo $this->_js;
			}
		}

		/**
		 * Return prepared element with map
		 *
		 * @param string $_emelent
		 * @param array $_params
		 * @param string $_value
		 * @see http://docs.fuelphp.com/classes/html.html#/function_html_tag
		 */
		public function getHtml($_emelent = 'div', $_params = array(), $_value = '')
		{

			$_params['id'] = $this->getContainer();

			if (isset($_params['class'])) {
				$_params['class'] .= ' ' . $this->_gmap_area;
			} else {
				$_params['class'] = $this->_gmap_area;
			}

			return html_tag((string) $_emelent, (array) $_params, (string) $_value);
		}

	}