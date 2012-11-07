<?php

namespace InesGmap;

class Map
{

	/**
	 * Container
	 *
	 * @var
	 */
	private $_container;

	/**
	 * @var
	 */
	private $_js;

	/**
	 * Current map unique id
	 *
	 * @var
	 */
	private $_id;

	/**
	 * Global class name for all elements contains map
	 *
	 * @var string
	 */
	private $_gmap_area = 'inesgmap_area';

	/**
	 * All geocodes for map
	 *
	 * @var array
	 */
	private $_geocode = array();

	/**
	 * Geocodes counter
	 *
	 * @var int
	 */
	private $_geocode_count = 0;

	/**
	 * Create new map
	 */
	public function __construct()
	{
		$this->setId((string)\Str::random('numeric', 6));
		$this->setContainer((string)\Str::random('alpha', 8));
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
			$this->_id = (string)$id;
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
		$this->_container = (string)$name;
	}

	/**
	 * Get container name
	 */
	public function getContainer()
	{
		return (string)$this->_container;
	}

	/**
	 * Get container id
	 */
	public function getId()
	{
		return (string)$this->_id;
	}

	/**
	 * Create new geocoder
	 *
	 * @see https://developers.google.com/maps/documentation/javascript/reference#Geocoder
	 * @see https://developers.google.com/maps/documentation/javascript/reference#GeocoderRequest
	 * @see https://developers.google.com/maps/documentation/javascript/reference#GeocoderResult
	 * @see https://developers.google.com/maps/documentation/javascript/reference#GeocoderStatus
	 * @param array $_request
	 * @param string|null $_callback
	 * @param string $_status
	 */
	public function addGeocode($_request, $_callback = null, $_status = 'OK')
	{

		if (!isset($_request) || !is_array($_request) || empty($_request)) {
			return false;
		}

		// Prepare request array
		foreach ($_request as $_key => $_param) {
			$this->_geocode[$this->_geocode_count] = $_request;
		}

		// Set default callback function
		if (!isset($_callback)) {
			$_callback = 'geocode_callback_' . $this->_geocode_count;
			$this->_geocode[$this->_geocode_count]['callback_default'] = true; // prepare default callback
		}

		$this->_geocode[$this->_geocode_count]['callback'] = $_callback;
		$this->_geocode[$this->_geocode_count]['status'] = $_status;

		// Return current geocode ID
		return $this->_geocode_count++;
	}

	/**
	 * Get javascript code
	 *
	 * @param bool $_return
	 * @return string
	 */
	public function getScript($_return = false)
	{
		// Load js view
		$this->_js = \View::forge('inesGmap::gmap_js');

		// Set params
		$this->_js->id = $this->_id;
		$this->_js->container = $this->_container;

		// Add geocodes
		if (!empty($this->_geocode)) {
			$this->_js->set('geocodes', $this->_geocode, false);
		}

		// Set javascript header
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

		return html_tag((string)$_emelent, (array)$_params, (string)$_value);
	}


}