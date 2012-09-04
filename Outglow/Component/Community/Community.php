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
 * @copyright Outglow Components 2012
 * @package Community
 * @version 1.0
 * @license The MIT License (MIT)
*/

class Community
{
	/**
	 * CREATE TWO PROPERTIES TO STORE
	 * THE DEPENDENCIES
	 * @var array
	 * @var array
	*/
	private $container;
	private $hiddenContainer;

	/**
	 * - unsetHiddenContainerKey
	 * UNSETS THE INITIAL FUNCTION FROM
	 * FROM THE HIDEN CONTAINER
	 * PROPERTY
	 * @param String
	 * @return bool
	*/
	private function unsetHiddenContainerKey($key)
	{
		return unset($this->hiddenContainer[$key]);
	}

	/**
	 * - constructor
	 * ASSIGN TWO PROPERTIES AS EMPTY ARRAYS
	 * @return NULL
	*/
	public function __construct()
	{
		$this->container 	   = array();
		$this->hiddenContainer = array();
	}

	/**
	 * - set
	 * USE KEYS AND VALUES TO ASSIGN THE
	 * RESULT OF WHAT WILL BE AN
	 * ANONYMOUS FUNCTION
	 * @param String
	 * @param Function
	 * @return bool
	*/
	public function set($key, $return)
	{
		return $this->container[$key] = $return;
	}

	/**
	 * - get
	 * PULL DEPENDENCY OUT OF THE
	 * CONTAINER AND RETURN ITS
	 * VALUE
	 * @param String
	 * @return object
	*/
	public function get($key)
	{
		if (isset($this->container[$key]) && !isset($this->hiddenContainer[$key]))
		{
			$this->hiddenContainer[$key] = $this->container[$key]();
		}
		return $this->hiddenContainer[$key];
	}
}

?>