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

class App extends Container implements AppInterface
{
	private $baseUrl;
	private $route;
	private $serverProcessor;
	private $routerProcessor;
	private $closureMethod;

	/**
	 * - constructor
	 * CREATES ALL REQUIRED PROCESSORS
	 * AND OBJECTS
	 * @return null
	 */
	public function __construct()
	{
		$this->serverProcessor = new Server_Processor();
		$this->routerProcessor = new Router_Processor();
	}

	/**
	 * - setup
	 * CONFIGURES MICROFRAMEWORK
	 * ONLY USING THE BASE URL FOR THE
	 * PROJECT
	 * @param String
	 * @return Bool
	 */
	public function setup($base_url)
	{
		$base_url = (substr($base_url, -1) == '/') ? substr($base_url, 0, -1) : $base_url;

		$this->baseUrl = $base_url;
		$this->route   = $this->serverProcessor->processRequestStringForRoute($this->baseUrl);
		$this->route   = $this->routerProcessor->overrideEmptyRouteToSingleSlash($this->route);
		return true;
	}

	/**
	 * - route
	 * PULLS BACK THE METHOD
	 * DEF THAT MAPS TO THE
	 * ROUTE
	 * @param String
	 * @param Closure
	 * @return Closure/Bool
	 */
	public function route($key, \Closure $function)
	{
		return ($key == $this->route) ? $this->closureMethod = $function : false;
	}

	/**
	 * - run
	 * RUNS THE APPLICATION
	 * @return Function
	 */
	public function run()
	{
		$function = $this->closureMethod;
		return $function();
	}
}
?>