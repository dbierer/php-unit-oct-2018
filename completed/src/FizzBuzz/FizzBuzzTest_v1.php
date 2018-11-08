<?php
require 'FizzBuzz.php';

class FizzBuzzTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function initialTest()
    {
        $this->assertEquals(true, true);
    }
    /**
     * @test
     */
     public function fizzHandledCorrectly()
     {
         $fizzBuzz = new FizzBuzz();
         $expected = ['Fizz'];
         $response = $fizzBuzz->process([3]);
         $this->assertEquals($expected, $response);
     }
    /**
     * @test
     */
     public function buzzHandledCorrectly()
     {
         $fizzBuzz = new FizzBuzz();
         $expected = ['Buzz'];
         $response = $fizzBuzz->process([5]);
         $this->assertEquals($expected, $response);
     }
    /**
     * @test
     */
     public function rangeOfNumbers0to15()
     {
         $fizzBuzz = new FizzBuzz();
         $expected = [0,1,2,'Fizz',4,'Buzz','Fizz',7,8,'Fizz','Buzz',11,'Fizz',13,14,'FizzBuzz'];
         $response = $fizzBuzz->process(range(0,15));
         $this->assertEquals($expected, $response);
     }
}
