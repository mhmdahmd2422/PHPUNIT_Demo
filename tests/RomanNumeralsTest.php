<?php


use App\RomanNumeral;
use PHPUnit\Framework\TestCase;

class RomanNumeralsTest extends TestCase
{
    /**
     * @test
     * @dataProvider checks
     */
    public function it_generates_a_roman_numeral_from_0_to_3999($num, $exp)
    {
        $numeral = new RomanNumeral;

        $this->assertEquals($exp, $numeral->generate($num));
    }

    /**
     * @test
     */
    public function it_cannot_generate_a_roman_numeral_for_less_than_1()
    {
        $numeral = new RomanNumeral;

        $this->assertFalse($numeral->generate(0));
    }

    /**
     * @test
     */
    public function it_cannot_generate_a_roman_numeral_for_more_than_3999()
    {
        $numeral = new RomanNumeral;

        $this->assertFalse($numeral->generate(4000));
    }

    public static function checks()
    {
        return [
            [1, 'I'],
            [2, 'II'],
            [3, 'III'],
            [4, 'IV'],
            [5, 'V'],
            [6, 'VI'],
            [7, 'VII'],
            [8, 'VIII'],
            [9, 'IX'],
            [10, 'X'],
            [11, 'XI'],
            [14, 'XIV'],
            [15, 'XV'],
            [16, 'XVI'],
            [19, 'XIX'],
            [20, 'XX'],
            [40, 'XL'],
            [50, 'L'],
            [90, 'XC'],
            [100, 'C'],
            [400, 'CD'],
            [500, 'D'],
            [900, 'CM'],
            [1000, 'M'],
            [3999, 'MMMCMXCIX'],
        ];
    }
}
