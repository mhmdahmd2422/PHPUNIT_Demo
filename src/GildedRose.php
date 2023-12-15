<?php

namespace App;

class GildedRose
{
    public $name;

    public $quality;

    public $sellIn;

    public function __construct($name, $quality, $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public static function of($name, $quality, $sellIn)
    {
        return new static($name, $quality, $sellIn);
    }

    public function tick()
    {
        return match ($this->name) {
            'normal' => $this->normalTick(),
            'Aged Brie' => $this->brieTick(),
            'Backstage passes to a TAFKAL80ETC concert' => $this->backstagePassTick(),
            'Sulfuras, Hand of Ragnaros' => $this->sulfurasTick(),
        };
    }

    protected function normalTick()
    {
        $this->sellIn -= 1;
        $this->quality -= 1;

        if($this->sellIn <= 0){
            $this->quality -= 1 ;
        }
        if($this->quality < 0){
            $this->quality = 0 ;
        }
    }

    protected function brieTick()
    {
        $this->sellIn -= 1;
        $this->quality += 1;

        if($this->sellIn <= 0){
            $this->quality += 1 ;
        }

        if($this->quality > 50){
            $this->quality = 50 ;
        }
    }

    protected function sulfurasTick()
    {
    }

    protected function backstagePassTick()
    {
        $this->quality += 1;

        if($this->sellIn <= 5){
            $this->quality += 1 ;
        }

        if($this->sellIn <= 10){
            $this->quality += 1 ;
        }

        if($this->sellIn <= 0){
            $this->quality = 0 ;
        }

        if($this->quality > 50){
            $this->quality = 50 ;
        }
        $this->sellIn -= 1;
    }
}