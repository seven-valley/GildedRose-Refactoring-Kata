<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    /**
     * @param Item[] $items
     */
    public function __construct(
        private array $items
    ) {}

    public function updateQuality(): void
    {

        foreach ($this->items as $item) {
            $special = ItemSpecialFactory::create($item);
            $special->modify($item);
        }
    
    }


}
