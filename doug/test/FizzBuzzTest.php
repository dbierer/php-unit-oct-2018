<?php

use Application\FizzBuzz\FizzBuzz;
class FizzBuzzTest extends PHPUnit\Framework\TestCase
{
	protected $fizzBuzz;
	public function setup()
	{
		$this->fizzBuzz = new FizzBuzz();
	}
    /**
     * Testing "fizz" result
     */
    public function testFizzHandledCorrectly()
    {
         $this->assertEquals('Fizz', $this->fizzBuzz->process(3), 'Value did not return "Fizz"');
     }
    /**
     * Testing "fizz" incorrect result
     */
    public function testBuzzHandledCorrectly()
    {
         $this->assertEquals('Buzz', $this->fizzBuzz->process(5), 'Value did not return "Buzz"');
     }

}
