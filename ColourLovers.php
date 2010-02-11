<?php

/**
 * --------------------------------------------------
 * PHP Client Library for the COLOURlovers API
 *  
 * @author Brian Haveri
 * @link http://github.com/brianhaveri/Colour-Lovers-PHP
 * @license MIT License http://en.wikipedia.org/wiki/MIT_License
 * 
 * Related COLOURlovers API documentation: http://www.colourlovers.com/api
 * --------------------------------------------------
 */
class ColourLovers {

	/**
	 * --------------------------------------------------
	 * Class variables defining default behavior
	 * You can change these (optional)
	 * --------------------------------------------------
	 */
	private $_defaultResponseFormat = 'xml'; // xml or json
	private $_resultType = 'array'; // array, object, or raw (JSON or XML response directly from server)
	private $_convertResponse = TRUE; // TRUE or FALSE
	
	
	/**
	 * --------------------------------------------------
	 * Don't change these
	 * --------------------------------------------------
	 */
	private $_apiUrl = 'http://www.colourlovers.com/api/'; // Root API address including trailing slash
	private $_validResponseFormats = array('xml', 'json');
	private $_validResultTypes = array('array', 'object', 'raw');
	private $_lastRequest = NULL;
	
	
	/**
	 * --------------------------------------------------
	 * Provides access to _resultType
	 * @param string $type
	 * --------------------------------------------------
	 */
	public function set_result_type($type) {
		if(in_array($type, $this->_validResultTypes)) {
			$this->_resultType = strtolower($type);
		}
	}
	
	
	/**
	 * --------------------------------------------------
	 * Returns the last request submittd to the API
	 * @return string
	 * --------------------------------------------------
	 */
	public function last_request() {
		return $this->_lastRequest;
	}

	
	/**
	 * --------------------------------------------------
	 * Query colors
	 * @param array $query
	 * @return object
	 * --------------------------------------------------
	 */
	public function colors($query=array()) {
		return $this->_callMethod(__FUNCTION__, $query);
	}
	
	
	/**
	 * --------------------------------------------------
	 * Query new colors
	 * @param array $query
	 * @return object
	 * --------------------------------------------------
	 */
	public function colors_new($query=array()) {
		return $this->_callMethod(__FUNCTION__, $query);
	}
	
	
	/**
	 * --------------------------------------------------
	 * Query top colors
	 * @param array $queryhttp://www.colourlovers.com/api
	 * @return object
	 * --------------------------------------------------
	 */
	public function colors_top($query=array()) {
		return $this->_callMethod(__FUNCTION__, $query);
	}
	
	
	/**
	 * --------------------------------------------------
	 * Query random colors
	 * @return object
	 * --------------------------------------------------
	 */
	public function colors_random() {
		return $this->_callMethod(__FUNCTION__, array());
	}
	
	
	/**
	 * --------------------------------------------------
	 * Query one color
	 * @param array $query
	 * @return object
	 * --------------------------------------------------
	 */
	public function color($query) {
		list($call, $args) = $this->_singleQuery('hex', $query);
		return $this->_callMethod(__FUNCTION__.$call, $args);
	}
	
	
	/**
	 * --------------------------------------------------
	 * Query palettes
	 * @param array $query
	 * @return object
	 * --------------------------------------------------
	 */
	public function palettes($query=array()) {
		return $this->_callMethod(__FUNCTION__, $query);
	}
	
	
	/**
	 * --------------------------------------------------
	 * Query new palettes
	 * @param array $query
	 * @return object
	 * --------------------------------------------------
	 */
	public function palettes_new($query=array()) {
		return $this->_callMethod(__FUNCTION__, $query);
	}
	
	
	/**
	 * --------------------------------------------------
	 * Query top palettes
	 * @param array $query
	 * @return object
	 * --------------------------------------------------
	 */
	public function palettes_top($query=array()) {
		return $this->_callMethod(__FUNCTION__, $query);
	}
	
	
	/**
	 * --------------------------------------------------
	 * Query random palettes
	 * @return object
	 * --------------------------------------------------
	 */
	public function palettes_random() {
		return $this->_callMethod(__FUNCTION__, array());
	}
	
	
	/**
	 * --------------------------------------------------
	 * Query one palette
	 * @param array $query
	 * @return object
	 * --------------------------------------------------
	 */
	public function palette($query) {
		list($call, $args) = $this->_singleQuery('id', $query);
		return $this->_callMethod(__FUNCTION__.$call, $args);
	}
	
	
	/**
	 * --------------------------------------------------
	 * Query patterns
	 * @param array $query
	 * @return object
	 * --------------------------------------------------
	 */
	public function patterns($query=array()) {
		return $this->_callMethod(__FUNCTION__, $query);
	}
	
	
	/**
	 * --------------------------------------------------
	 * Query new palettes
	 * @param array $query
	 * @return object
	 * --------------------------------------------------
	 */
	public function patterns_new($query=array()) {
		return $this->_callMethod(__FUNCTION__, $query);
	}
	
	
	/**
	 * --------------------------------------------------
	 * Query top palettes
	 * @param array $query
	 * @return object
	 * --------------------------------------------------
	 */
	public function patterns_top($query=array()) {
		return $this->_callMethod(__FUNCTION__, $query);
	}
	
	
	/**
	 * --------------------------------------------------
	 * Query random palettes
	 * @return object
	 * --------------------------------------------------
	 */
	public function patterns_random() {
		return $this->_callMethod(__FUNCTION__, array());
	}
	
	
	/**
	 * --------------------------------------------------
	 * Query one pattern
	 * @param array $query
	 * @return object
	 * --------------------------------------------------
	 */
	public function pattern($query) {
		list($call, $args) = $this->_singleQuery('id', $query);
		return $this->_callMethod(__FUNCTION__.$call, $args);
	}
	
	
	/**
	 * --------------------------------------------------
	 * Query lovers
	 * @param array $query
	 * @return object
	 * --------------------------------------------------
	 */
	public function lovers($query=array()) {
		return $this->_callMethod(__FUNCTION__, $query);
	}
	
	
	/**
	 * --------------------------------------------------
	 * Query new lovers
	 * @param array $query
	 * @return object
	 * --------------------------------------------------
	 */
	public function lovers_new($query=array()) {
		return $this->_callMethod(__FUNCTION__, $query);
	}
	
	
	/**
	 * --------------------------------------------------
	 * Query top lovers
	 * @param array $query
	 * @return object
	 * --------------------------------------------------
	 */
	public function lovers_top($query=array()) {
		return $this->_callMethod(__FUNCTION__, $query);
	}
	
	
	/**
	 * --------------------------------------------------
	 * Query one lover
	 * @param array $query
	 * @return object
	 * --------------------------------------------------
	 */
	public function lover($query) {
		list($call, $args) = $this->_singleQuery('username', $query);
		return $this->_callMethod(__FUNCTION__.$call, $args);
	}
	
	
	/**
	 * --------------------------------------------------
	 * Query stats for colors
	 * @param array $query
	 * @return object
	 * --------------------------------------------------
	 */
	public function stats_colors($query=array()) {
		return $this->_callMethod(__FUNCTION__, $query);
	}
	
	
	/**
	 * --------------------------------------------------
	 * Query stats for palettes
	 * @param array $query
	 * @return object
	 * --------------------------------------------------
	 */
	public function stats_palettes($query=array()) {
		return $this->_callMethod(__FUNCTION__, $query);
	}
	
	
	/**
	 * --------------------------------------------------
	 * Query stats for patterns
	 * @param array $query
	 * @return object
	 * --------------------------------------------------
	 */
	public function stats_patterns($query=array()) {
		return $this->_callMethod(__FUNCTION__, $query);
	}
	
	
	/**
	 * --------------------------------------------------
	 * Query stats for lovers
	 * @param array $query
	 * @return object
	 * --------------------------------------------------
	 */
	public function stats_lovers($query=array()) {
		return $this->_callMethod(__FUNCTION__, $query);
	}
	
	
	/**
	 * --------------------------------------------------
	 * Calls the appropriate API method
	 * @param string $method
	 * @param array $query
	 * @return object
	 * --------------------------------------------------
	 */
	private function _callMethod($method, $query=array()) {
		$request = $this->_getRequest($method, $query);
		$response = $this->_getResponse($request);
		
		// _convertResponse() can only handle
		// formats identified in _validFormats
		$format = $this->_defaultResponseFormat;
		if(is_array($query) && array_key_exists('format', $query)) {
			if(in_array($query['format'], $this->_validResponseFormats)) {
				$format = $query['format'];
			}
		}
		
		if($this->_resultType !== 'raw') {
			$response = $this->_convertResponse($format, $response);
		}
		return $response;
	}
	
	
	/**
	 * --------------------------------------------------
	 * Performs the API query
	 * @param string $request
	 * @return string
	 * --------------------------------------------------
	 */
	private function _getResponse($request) {
		$options = array(
			CURLOPT_URL => $request,
			CURLOPT_RETURNTRANSFER => TRUE,
			CURLOPT_USERAGENT => __CLASS__.' PHP Client Library'
		);
		$ch = curl_init();
		curl_setopt_array($ch, $options);
		$query = curl_exec($ch);
		$this->_lastRequest = $request;
		curl_close($ch);
		return $query;
	}
	
	
	/**
	 * --------------------------------------------------
	 * Converts the API response into an object
	 * @param string $response
	 * @return object|array
	 * --------------------------------------------------
	 */
	private function _convertResponse($format, $response) {
		switch($format) {
			case 'json': return $this->_convertResponseJSON($response);
			case 'xml': return $this->_convertResponseXML($response);
		}
		return FALSE;
	}
	
	
	/**
	 * --------------------------------------------------
	 * Converts a JSON response
	 * @param string $response
	 * @return object|array
	 * --------------------------------------------------
	 */
	private function _convertResponseJSON($response) {
		$returnArray = FALSE;
		if($this->_resultType === 'array') {
			$returnArray = TRUE;
		}
		return json_decode($response, $returnArray);
	}
	
	
	/**
	 * --------------------------------------------------
	 * Converts a XML response into a SimpleXML object
	 * @param string $response
	 * @return object|array
	 * --------------------------------------------------
	 */
	private function _convertResponseXML($response) {
		$simple = simplexml_load_string($response, 'SimpleXMLElement', LIBXML_NOCDATA);
		if($this->_resultType === 'array') {
			return $this->_simpleXMLToArray($simple);
		}
		return $simple;
	}
	
	
	/**
	 * --------------------------------------------------
	 * Recursively finds any objects and converts them to non-objects
	 * This could be carved out into a separate class
	 * @param mixed $element
	 * @return mixed
	 * --------------------------------------------------
	 */
	private function _simpleXMLToArray($element) {
		$out = $element;
		if(is_object($element) || is_array($element)) {
			if(count((array) $element) > 0) {
				$out = array();
				$arr = (array) $element;
				foreach($arr as $k=>$v) {
					$out[$k] = $this->_simpleXMLToArray($v);
				}
				return $out;
			}
			return NULL;
		}
		return $out;
	}									
	
	
	/**
	 * --------------------------------------------------
	 * Generates a request string
	 * @param string $method
	 * @param array $query
	 * @return string
	 * --------------------------------------------------
	 */
	private function _getRequest($method, $query=array()) {
		$out = array(
			$this->_apiUrl,
			$this->_convertMethod($method)
		);
		if(is_array($query) && count($query) > 0) {
			$out[] = '?';
			$out[] = http_build_query($query);
		}
		return join('', $out);
	}
	
	
	/**
	 * --------------------------------------------------
	 * Converts a method name into the API's format
	 * Ex: color_random => color/random
	 * @param string $method
	 * @return string
	 * --------------------------------------------------
	 */
	private function _convertMethod($method) {
		return str_replace('_', '/', $method);
	}
	
	
	/**
	 * --------------------------------------------------
	 * Turns a query into the correct format for singular methods (color, palette, pattern, lover)
	 * @param array|string $query
	 * @return array
	 * --------------------------------------------------
	 */
	private function _singleQuery($keyToFind, $query) {
		if(is_array($query) && array_key_exists($keyToFind, $query)) {
			$out = array('/'.$query[$keyToFind]);
			unset($query[$keyToFind]);
			$out[] = $query;
			return $out;
		}
		else {
			$query = (string) $query;
			return array('/'.$query, array());
		}
		return array(NULL, NULL);
	}
}

?>
