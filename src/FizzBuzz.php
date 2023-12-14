<?php

namespace App;

class FizzBuzz
{
    public static function convert(int $number): int|string
    {
        $result = '';
        if(self::isDivisibleBy( 3, $number)){
            $result .= 'fizz';
        }
        if(self::isDivisibleBy( 5, $number)){
            $result .= 'buzz';
        }

        return $result?: $number;
    }

    protected static function isDivisibleBy($divider, $number): bool
    {
        return $number % $divider === 0;
    }
}