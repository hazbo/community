<?php

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

require_once(__DIR__ . '/../src/Outglow/Component/Community/ContainerInterface.php');
require_once(__DIR__ . '/../src/Outglow/Component/Community/Container.php');

use Outglow\Component\Community\Container;

class ContainerTest extends PHPUnit_Framework_TestCase
{
	private $community;

	/**
	 * - setUp
	 * CREATES A NEW COMMUNITY OBJECT
	 */
	public function setUp()
	{
		$this->container = new Container();
	}

	/**
	 * @covers Outglow\Component\Community\Container::set
	 */
	public function testSet()
	{
		$result = $this->container->set('String', function() {
			return 'string';
		});
		$this->assertTrue($result);
	}

	/**
	 * @covers Outglow\Component\Community\Container::stack
	 */
	public function testStack()
	{
		$result = $this->container->stack(array(
			'type'   => 'string',
			'object' => '\stdClass'
		));
		$this->assertTrue($result);
	}

	/**
	 * @covers Outglow\Component\Community\Container::get
	 */
	public function testGet()
	{
		$this->container->set('String', function() {
			return 'string';
		});
		$result   = $this->container->get('String');
		$expected = 'string';
		$this->assertEquals($expected, $result, "Value 'string' not returned");
	}

	/**
	 * @covers Outglow\Component\Community\Container::remove
	 */
	public function testRemove()
	{
		$this->container->set('String', function() {
			return 'string';
		});
		$result   = $this->container->remove('String');
		$this->assertTrue($result);
	}
}

?>