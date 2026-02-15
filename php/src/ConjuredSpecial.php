<?php 

declare(strict_types=1);

namespace GildedRose;

class ConjuredSpecial implements ItemSpecialInterface
{
    public function modify(Item $item): void
    {
        $item->sellIn--;
        // "Conjured" voient leur qualité se dégrader 
        // de deux fois plus vite que les objets normaux.
        $this->minusQualityTwice($item);

        if ($item->sellIn < 0) {
            $this->minusQualityTwice($item);
        }
    }

    private function minusQualityTwice(Item $item): void
    {
        $this->minusQuality($item);
        $this->minusQuality($item);
    }

    private function minusQuality(Item $item): void
    {
        if ($item->quality > 0) {
            $item->quality--;
        }
    }
}
