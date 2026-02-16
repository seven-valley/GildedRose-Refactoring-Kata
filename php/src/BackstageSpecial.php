<?php

declare(strict_types=1);

namespace GildedRose;

class BackstageSpecial implements ItemSpecialInterface
{
    public function modify(Item $item): void
    {
        $item->sellIn--;
        // La qualité augmente de 2 quand il reste 10 jours ou moins 
        // et de 3 quand il reste 5 jours ou moins, mais la qualité tombe à 0 après le concert
        if ($item->sellIn < 0) {
            $item->quality = 0;
            return;
        }

        $this->addQuality($item);

        

        if ($item->sellIn <= 5) {
            $this->addQuality($item);
            $this->addQuality($item);
        }else if ($item->sellIn <= 10) {
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
