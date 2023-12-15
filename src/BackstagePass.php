<?php

namespace App;

class BackstagePass extends Item
{
    public function tick()
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

        $this->quality = $this->limitQuality($this->quality);
        $this->sellIn -= 1;
    }
}