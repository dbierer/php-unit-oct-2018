<?php
require 'FizzBuzz.php';

class FizzBuzzTest extends PHPUnit_Framework_TestCase
{
    public function fizzBuzzProvider()
    {
        // Collection, Expected Result
        return [
            [[3], ['Fizz']],
            [[1, 2, 5], [1, 2, 'Buzz']],
            [[3, 5, 15], ['Fizz', 'Buzz', 'FizzBuzz']]
        ];
    }

    /**
     * @test
     * @dataProvider fizzBuzzProvider
     */
     public function fizzBuzzProviderTest($collection, $expected)
     {
         $fizzBuzz = new FizzBuzz();
         $response = $fizzBuzz->process($collection);

         $this->assertEquals(
            $expected,
            $response,
            'FizzBuzz did not transform collection as expected'
        );
     }
}
