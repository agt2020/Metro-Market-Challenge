<?php

namespace App;

use App\Reader;
use App\Filter;

class Kernel
{
        protected string $filter;
        protected array  $params;
        protected string $index;
        protected OfferCollection $collection;

        public function __construct($filter, $params)
        {
                $this->filter = $filter;
                $this->params = $params;
        }

        public function run($index)
        {
                $this->setIndex($index);
                // READ HTTP (COLLECTION)
                $this->read();
                // FILTER AND RETURN RESULT
                $this->filter();
        }

        private function filter()
        {
                $items = [];
                foreach ($this->collection->getIterator() as $value)
                {
                        if(Filter::create([
                                        'filter' => $this->filter,
                                        'params' => $this->params,
                                        'offer' => $value
                                ])->do())
                        {
                                $items[] = $value;
                        }
                }
                echo count($items);
        }

        private function read()
        {
                $reader = new Reader();
                $this->collection = $reader->read($this->getIndex());
        }

        private function setIndex($index)
        {
                $this->index = $index;
        }

        private function getIndex()
        {
                return $this->index;
        }
}