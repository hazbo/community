<?php

require_once(__DIR__ . '/../src/Outglow/Component/Community/ContainerInterface.php');
require_once(__DIR__ . '/../src/Outglow/Component/Community/Container.php');

use Outglow\Component\Community\Container;

class CommunityTest extends PHPUnit_Framework_TestCase
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
	 * - testSet
	 * TESTS PUBLIC SET METHOD
	 */
	public function testSet()
	{
		$result = $this->container->set('String', function() {
			return 'string';
		});
		$expected = true;
		$this->assertTrue($result == $expected);
	}

	/**
	 * - testGet
	 * TESTS PUBLIC GET METHOD
	 */
	public function testGet()
	{
		$this->container->set('String', function() {
			return 'string';
		});
		$result   = $this->container->get('String');
		$expected = 'string';
		$this->assertTrue($result == $expected);
	}

	/**
	 * - testRemove
	 * TESTS PUBLIC REMOVE METHOD
	 */
	public function testRemove()
	{
		$this->container->set('String', function() {
			return 'string';
		});
		$result   = $this->container->remove('String');
		$expected = true;
		$this->assertTrue($result == $expected);
	}
}

?>