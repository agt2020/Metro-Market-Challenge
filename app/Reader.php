<?php

namespace App;

use App\OfferCollection;
use App\Interfaces\ReaderInterface;
use App\Interfaces\OfferCollectionInterface;
use GuzzleHttp\Client;

class Reader implements ReaderInterface
{
        protected string $resourcePath;
        protected string $jsonData;
        protected OfferCollection $collection;

        public function read(string $input): OfferCollectionInterface
        {
                // GET DATA
                $this->setResourcePath($input);
                $this->jsonData = $this->FetchResources();
                // CREATE OFFER COLLECTION
                $this->collection = new OfferCollection();
                if($this->isJson())
                {
                        foreach (json_decode($this->jsonData,1) as $key => $offer)
                        {
                                // ADD OFFERS
                                $this->collection->add($key, Offers::generator([
                                        'offerId'      => $offer['offerId'],
                                        'productTitle' => $offer['productTitle'],
                                        'vendorId'     => $offer['vendorId'],
                                        'price'        => $offer['price'],
                                ]));
                        }
                }
                return $this->collection;
        }

        private function FetchResources()
        {
                try
                {
                        $client = new Client();
                        $response = $client->request('GET', $this->getResourcePath());

                        return $response->getBody();
                }
                catch(\Exception $e)
                {
                        throw new \Exception('Data fetch Unsuccessful !');
                }
        }

        private function setResourcePath($input)
        {
                $this->resourcePath = $input;
        }

        private function getResourcePath()
        {
                return $this->resourcePath;
        }

        private function isJson()
        {
                json_decode($this->jsonData);
                return json_last_error() === JSON_ERROR_NONE;
        }
}