<?php

namespace App;

use App\Offers;
use Iterator;
use App\OfferIterator;
use App\Interfaces\OfferInterface;
use App\Interfaces\OfferCollectionInterface;

class OfferCollection extends OfferIterator implements OfferCollectionInterface
{
        protected OfferInterface $offer;

        public function __construct()
        {
                parent::__construct($this->items);
        }

        public function get(int $index): OfferInterface
        {
                return $this->items[$index];
        }

        public function add($key, Offers $offer)
        {
                $this->items[$key] = $offer;
        }

        public function getIterator(): Iterator
        {
                return new \ArrayIterator($this->items);
        }
}