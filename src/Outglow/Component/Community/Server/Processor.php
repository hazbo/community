<?php namespace Outglow\Component\Community;

/**
 * A SIMPLE / SMALL DEPENDENCY INJECTION
 * CONTAINER FOR PHP 5.3.0 + 5.4.0
 * 
 * FEEL FREE TO USE / MODIFY ANY OF THIS
 * CODE FOR YOUR OWN PROJECTS
 * OPEN SOURCE / COMMERCIAL
 *
 * @author Harry Lawrence
 * @copyright Outglow Components 2013
 * @package Community
 * @version 1.2 Stable
 * @license The MIT License (MIT)
*/

class Server_Processor
{
	/**
	 * STORES STRING VALUES
	 * FROM SERVER SUPERGLOBALS
	 * @var String
	 * @var String
	 * @var String
	 */
	private $httpHost;
	private $requestUri;
	private $requestString;

	private function setHttpHost()
	{
		return $this->httpHost = $_SERVER['HTTP_HOST'];
	}

	/**
	 * - setRequestUri
	 * SETS THE REQUEST URI
	 * PROPERTY
	 * @return Bool
	 */
	private function setRequestUri()
	{
		return $this->requestUri = $_SERVER['REQUEST_URI'];
	}

	/**
	 * - concatFullRequestString
	 * CONCATS THE FULL REQUEST
	 * STRING READY TO BE USED
	 * @return Bool
	 */
	private function concatFullRequestString()
	{
		return $this->requestString = 'http://' . $this->httpHost . $this->requestUri;
	}

	/**
	 * - constructor
	 * SETS ALL THE INITIAL CLASS
	 * PROPERTIES
	 * @return null
	 */
	public function __construct()
	{
		$this->setHttpHost();
		$this->setRequestUri();
		$this->concatFullRequestString();
	}

	/**
	 * - getRequestString
	 * GETS THE FULLY FORMED REQUEST
	 * STRING
	 * @return String
	 */
	public function getRequestString()
	{
		return $this->requestString;
	}

	/**
	 * - processRequestStringForRoute
	 * PROCESSES THE REQUEST STRING TO
	 * HELP FIND OUT WHAT THE ROUTE
	 * ACTUALLY IS
	 * @return String
	 */
	public function processRequestStringForRoute($baseUrl)
	{
		return end(explode($baseUrl, $this->requestString));
	}
}

?>