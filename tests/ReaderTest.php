<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use App\Reader;
use App\OfferCollection;

class ReaderTest extends TestCase
{
        public function test_reader_result_must_instance_of_collection()
        {
                $reader = new Reader();
                $collection = $reader->read('http://localhost:8000/offers');

                $this->assertInstanceOf(OfferCollection::class, $collection);
        }
}