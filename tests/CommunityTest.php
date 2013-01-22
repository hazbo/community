<?php

require_once(__DIR__ . '/../src/Outglow/Component/Community/CommunityInterface.php');
require_once(__DIR__ . '/../src/Outglow/Component/Community/Community.php');

use Outglow\Component\Community\Community;

class CommunityTest extends PHPUnit_Framework_TestCase
{
	private $community;

	/**
	 * - setUp
	 * CREATES A NEW COMMUNITY OBJECT
	 */
	public function setUp()
	{
		$this->community = new Community();
	}

	/**
	 * - testSet
	 * TESTS PUBLIC SET METHOD
	 */
	public function testSet()
	{
		$result = $this->community->set('String', function() {
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
		$this->community->set('String', function() {
			return 'string';
		});
		$result   = $this->community->get('String');
		$expected = 'string';
		$this->assertTrue($result == $expected);
	}

	/**
	 * - testRemove
	 * TESTS PUBLIC REMOVE METHOD
	 */
	public function testRemove()
	{
		$this->community->set('String', function() {
			return 'string';
		});
		$result   = $this->community->remove('String');
		$expected = true;
		$this->assertTrue($result == $expected);
	}
}

?>