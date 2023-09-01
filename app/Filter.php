<?php

namespace App;

class Filter
{
        protected string $filter;
        protected array  $params;
        protected Offers $offer;

        public function __construct($data)
        {
                extract($data);

                $this->filter     = $filter;
                $this->params     = $params;
                $this->offer = $offer;
        }

        public static function create($data)
        {
                return new static($data);
        }

        public function do()
        {
                return match ($this->filter)
                {
                        'count_by_price_range' => $this->priceRangeFilter(),
                        'count_by_vendor_id' => $this->vendorIdFilter(),
                        'count_by_offer_id' => $this->offerIdFilter(),
                        'count_by_product_title' => $this->productTitleFilter(),
                };
        }

        private function priceRangeFilter()
        {
                 if($this->offer->getPrice() >= $this->params[0] && $this->offer->getPrice() <= $this->params[1])
                {
                        return true;
                }
        }

        private function vendorIdFilter()
        {
                if($this->offer->getVendorId() == $this->params[0])
                {
                        return true;
                }
        }

        private function offerIdFilter()
        {
                if($this->offer->getOfferId() == $this->params[0])
                {
                        return true;
                }
        }

        private function productTitleFilter()
        {
                if($this->offer->getProductTitle() == implode(" ",$this->params))
                {
                        return true;
                }
        }
}