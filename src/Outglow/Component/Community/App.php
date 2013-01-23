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
 * @version 1.1 Stable
 * @license The MIT License (MIT)
*/

class App implements AppInterface
{
	private $baseUrl;

	public $container;

	public function __construct()
	{
		$this->container = new Container();
	}

	public function setup($base_url)
	{
		$this->baseUrl = $base_url;
	}

	public function route($key, $function)
	{
		
	}
}
?>