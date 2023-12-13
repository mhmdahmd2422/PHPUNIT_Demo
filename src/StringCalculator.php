<?php

namespace App;

use Exception;

class StringCalculator
{
    const MAX_NUMBER_ALLOWED = 1000;
    protected string $delimiter = ',|\\\\n';
    public function add(string $nums)
    {
        $this->disallowNegatives($nums = $this->parseString($nums));

        return array_sum(
            $this->ignoreMoreThanAllowed($nums)
        );
    }

    protected function parseString(string $nums): array
    {
        if(preg_match('/\/\/(.)\\\\n/', $nums, $matches)){
            //set delimiter to matched regex '(.)'
            $this->delimiter = $matches[1];
            //remove custom delimiter indicator '//delimiter\n'
            $nums = str_replace($matches[0], '', $nums);
        }
        return preg_split("/{$this->delimiter}/", $nums);
    }

    protected function disallowNegatives(array $nums): void
    {
        foreach ($nums as $num) {
            if ($num < 0 && !empty($num)) {
                throw new Exception('negatives not allowed');
            }
        }
    }

    public function ignoreMoreThanAllowed(array $nums): array
    {
        return array_filter($nums, fn($nums) =>
           $nums <= self::MAX_NUMBER_ALLOWED
        );
    }
}