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

	public function __construct()
	{
		$this->serverProcessor = new Server_Processor();
	}

	public function setup($base_url)
	{
		$this->baseUrl = $base_url;
		$this->route   = $this->serverProcessor->processRequestStringForRoute($this->baseUrl);
	}

	public function route($key, $function)
	{
		if ($key == $this->route) {
			return $function();
		}
	}

	public function run()
	{

	}
}
?>