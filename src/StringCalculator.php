<?php

namespace App;

class StringCalculator
{
    public function add(string $nums)
    {
        $delimiter = ',|\\\\n';
        if(empty($nums)){
            return 0;
        }
        if(preg_match('/\/\/(.)\\\\n/', $nums, $matches)){
            //set delimiter to matched regex '(.)'
            $delimiter = $matches[1];
            //remove custom delimiter indicator '//delimiter\n'
            $nums = str_replace($matches[0], '', $nums);
        }
        $nums = preg_split("/{$delimiter}/", $nums);
        foreach ($nums as $num){
            if($num < 0){
                throw new \Exception('negatives not allowed');
            }
        }
        $nums = array_filter($nums, function ($nums){
           return $nums <= 1000;
        });

        return array_sum($nums);
    }
}