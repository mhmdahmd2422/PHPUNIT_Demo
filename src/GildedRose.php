<?php

namespace App;

use Exception;

class GildedRose
{
    private static array $lookupTable = [
        'normal' => Item::class,
        'Aged Brie' => Brie::class,
        'Backstage passes to a TAFKAL80ETC concert' => BackstagePass::class,
        'Sulfuras, Hand of Ragnaros' => Sulfuras::class,
        'Conjured Mana Cake' => Conjured::class,
    ];
    public static function of($name, $quality, $sellIn)
    {
        if(! array_key_exists($name, self::$lookupTable)){
            throw new Exception('Item type does not exist.');
        }

        $class = self::$lookupTable[$name];

        return new $class($quality, $sellIn);
    }
}