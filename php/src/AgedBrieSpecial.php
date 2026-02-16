<?php

declare(strict_types=1);

namespace GildedRose;


class AgedBrieSpecial implements ItemSpecialInterface
{
    public function modify(Item $item): void
    {
        $item->sellIn--;
        // "Aged Brie" augmente sa qualité (quality) plus le temps passe.
        $this->addQuality($item);

        if ($item->sellIn < 0) {
            $this->addQuality($item);
        }
    }

    private function addQuality(Item $item): void
    {
        if ($item->quality < 50) {
            $item->quality++;
        }
    }
}