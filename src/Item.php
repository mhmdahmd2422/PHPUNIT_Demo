<?php

namespace App;

class Item
{
    public $quality;

    public $sellIn;

    /**
     * @param $quality
     * @param $sellIn
     */
    public function __construct($quality, $sellIn)
    {
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public function tick()
    {
        $this->sellIn -= 1;
        $this->quality -= 1;

        if($this->sellIn <= 0){
            $this->quality -= 1 ;
        }

        $this->quality = $this->limitQuality($this->quality);
    }

    protected function limitQuality($value, $min = 0, $max = 50)
    {
        return max($min, min($max, $value));
    }
}