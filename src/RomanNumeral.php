<?php

namespace App;

class RomanNumeral
{
    const NUMERALS = [
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1,
    ];
    public function generate(int $num)
    {
        if($num <= 0 || $num >= 4000){
            return false;
        }
        $result = '';
        foreach (self::NUMERALS as $numeral => $number){
            for(; $num >= $number; $num -= $number){
                $result .= $numeral;
            }
        }
        return $result;
    }
}