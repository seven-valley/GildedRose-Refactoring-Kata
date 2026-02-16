<?php

declare(strict_types=1);

namespace GildedRose;

class BasicSpecial implements  ItemSpecialInterface

{
    public function modify(Item $item): void
    {
        $item->sellIn--;

        $this->minusQuality($item);

        if ($item->sellIn < 0) {
            $this->minusQuality($item);
        }
    }

    private function minusQuality(Item $item): void
    {
        if ($item->quality > 0) {
            $item->quality--;
        }
    }
}
