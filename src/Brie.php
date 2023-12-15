<?php

namespace App;

class Brie extends Item
{
    public function tick()
    {
        $this->sellIn -= 1;
        $this->quality += 1;

        if($this->sellIn <= 0){
            $this->quality += 1 ;
        }

        $this->quality = $this->limitQuality($this->quality);
    }
}