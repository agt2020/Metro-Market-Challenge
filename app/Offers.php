<?php

namespace App;

use App\Interfaces\OfferInterface;

class Offers implements OfferInterface
{
        private $offerId;
        private $productTitle;
        private $vendorId;
        private $price;

        public function __construct($offer)
        {
                extract($offer);

                $this->offerId      = $offerId;
                $this->productTitle = $productTitle;
                $this->vendorId     = $vendorId;
                $this->price        = $price;
        }

        public static function generator(array $offer)
        {
                return new static($offer);
        }

        public function getOfferId()
        {
                return $this->offerId;
        }

        public function getProductTitle()
        {
                return $this->productTitle;
        }

        public function getVendorId()
        {
                return $this->vendorId;
        }

        public function getPrice()
        {
                return $this->price;
        }
}