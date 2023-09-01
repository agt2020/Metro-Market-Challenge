<?php

namespace App;

use Iterator;

class OfferIterator implements \IteratorAggregate
{
        public function __construct(public $items)
        {
                
        }

        public function getIterator(): Iterator
        {
                return new \ArrayIterator($this->items);
        }
}