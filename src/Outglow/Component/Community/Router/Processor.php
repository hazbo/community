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

class Router_Processor
{
	/**
	 * - overrideEmptyRouteToSingleSlash
	 * IF ROUTE IS AN EMPTY STRING IT SETS IT
	 * TO A FORWARD SLASH INSTEAD
	 * @param String
	 * @return String
	 */
	public function overrideEmptyRouteToSingleSlash($route)
	{
		return ($route == '') ? '/' : $route;
	}
}

?>