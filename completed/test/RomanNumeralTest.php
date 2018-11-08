<?php
namespace CompletedTest;

use Completed\Roman\ {Converter,RomanNumeral};
use PHPUnit\Framework\TestCase;

class RomanNumeralTest extends TestCase
{
    public function numberDataProvider()
    {
        return [
            [range(1,10),
             ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X']],
            [range(11,20),
             ['XI', 'XII', 'XIII', 'XIV', 'XV', 'XVI', 'XVII', 'XVIII', 'XIX', 'XX']],
            [[40, 41, 43, 44, 45, 49],
             ['XL', 'XLI', 'XLIII', 'XLIV', 'XLV', 'XLIX']],
            [[50, 51, 53, 54, 55],
             ['L', 'LI', 'LIII', 'LIV', 'LV']]
        ];
    }

    /**
     * @test
     * @dataProvider numberDataProvider
     */
     public function testUsingConverterClass($collection, $expected)
     {
         $conv = new Converter();
         $response = $conv->arabicToRoman($collection);
         $this->assertEquals($expected, $response);
     }

    /**
     * @test
     * @dataProvider numberDataProvider
     */
     public function testUsingRomanNumeralClass($collection, $expected)
     {
         $roman = new RomanNumeral();
         $response = $roman->convert($collection);
         $this->assertEquals($expected, $response);
     }

}
