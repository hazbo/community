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

class Community implements CommunityInterface
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
	private function unsetContainerKey($key)
	{
		unset($this->container[$key]);
		return true;
	}

	/**
	 * - unsetContainerSingleKey
	 * UNSETS THE BOOLEAN KEY FOR SINGLE
	 * INSTANCES USED WHEN TRUE IS
	 * PASSED AS THE THIRD SET PARAM
	 * @param String
	 * @return bool
	 */
	private function unsetContainerSingleKey($key)
	{
		unset($this->container[$key . '_true']);
	}

	/**
	 * - unsetHiddenContainerKey
	 * UNSETS THE VALUE FOR WHAT
	 * IS STORED IN THE HIDDEN
	 * CONTAINER THAT RELATES TO
	 * THIS KEY
	 * @param String
	 * @return bool
	 */
	private function unsetHiddenContainerKey($key)
	{
		unset($this->hiddenContainer[$key]);
		return true;
	}

	/**
	 * - handleNewClosure
	 * CHECKS THE INPUT FOR AN
	 * INSTANCE OF CLOSURE
	 * @param Closure
	 * @param String
	 * @return bool
	*/
	private function handleNewInstanceOfClosure($input, $reference)
	{
		if (!($input instanceof \Closure)) {
			throw new \InvalidArgumentException(sprintf('Identifier "%s" does not contain an object definition.', $reference));
		} else {
			return true;
		}
		return false;
	}

	/**
	 * - checkForNewInstance
	 * CHECKS TO SEE IF WE NEED A
	 * NEW INSTANCE OF AN OBJECT
	 * EACH TIME OR NOT
	 * @param bool
	 * @param String
	 * @return bool
	 */
	private function checkForNewInstance($newInstanceFlag, $reference)
	{
		if ($newInstanceFlag == true) {
			$this->container[$reference . '_true'] = true;
		}
		return true;
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
	public function set($key, $return, $newInstance = false)
	{
		if ($this->handleNewInstanceOfClosure($return, $key) === true) {
			$this->checkForNewInstance($newInstance, $key);
			return $this->container[$key] = $return;
		}
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
		if ((isset($this->container[$key]) && !isset($this->hiddenContainer[$key])) || isset($this->container[$key . '_true'])) {
			$this->hiddenContainer[$key] = $this->container[$key]();
			if (!isset($this->container[$key . '_true'])) {
				$this->unsetContainerKey($key);
			}
		}
		return $this->hiddenContainer[$key];
	}

	/**
	 * - remove
	 * REMOVES ALL TRACES THAT ARE
	 * ASSOCIATED WITH THE GIVEN
	 * KEY
	 * @param String
	 * @return bool
	 */
	public function remove($key)
	{
		$this->unsetContainerKey($key);
		$this->unsetContainerSingleKey($key);
		$this->unsetHiddenContainerKey($key);
		return true;
	}
}

?>