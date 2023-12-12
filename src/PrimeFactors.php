<?php

namespace App;

class PrimeFactors
{
    public function generate($num): array
    {
        $factors = [];
        for ($divisor=2;$num > 1;$divisor++){
            for (; $num%$divisor === 0; $num /= $divisor){
                $factors[] = $divisor;
            }
        }
        return $factors;
    }

}