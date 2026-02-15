<?php

declare(strict_types=1);

namespace GildedRose;

class ItemSpecialFactory
{
    public static function create(Item $item): ItemSpecialInterface
    {
        if (str_contains($item->name, "Aged Brie")) {
            return new AgedBrieSpecial();
        } else if (str_contains($item->name, "Sulfuras")) {
            return new SulfuraSpecial();
        } else if (str_contains($item->name, "Backstage passes")) {
            return new BackstageSpecial();
        } else if (str_contains($item->name, "Conjured")) {
            return new ConjuredSpecial();
        } else {
            return new BasicSpecial();
        }
    }
}
