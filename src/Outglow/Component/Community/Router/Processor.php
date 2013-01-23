<?php namespace Outglow\Component\Community;

class Router_Processor
{
	public function overrideEmptyRouteToSingleSlash($route)
	{
		return ($route == '') ? '/' : $route;
	}
}

?>