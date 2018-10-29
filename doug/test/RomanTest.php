<?php

use Application\Roman\Convert;
class RomanTest extends PHPUnit\Framework\TestCase
{
	protected $convert;
	public function setup()
	{
		$this->convert = new Convert();
	}
	/**
	 * @dataProvider romanProvider
	 */
	public function testOneToTen($value, $expected)
	{
		$this->assertEquals($expected, $this->convert->whatever($value), 'Expected value was not obtained');
	}
	public function romanProvider()
	{
		return [
			[1, 'I'],
			[2, 'II'],
			[3, 'III'],
			[4, 'IV'],
			[5, 'V'],
		];
	}
}
