<?php

namespace Terranet\Contacts;

class Geocoder
{
    protected $address;

    public function __construct($address)
    {
        $this->address = $address;
    }

    public function getLocation()
    {
        $url = 'https://maps.google.com/maps/api/geocode/json?' .
            http_build_query([
                'address' => $this->address,
            ]);

        $json = json_decode(file_get_contents($url));

        if (count($results = $json->results) && $results = $results[0]) {
            if ($this->fullMatch($results)) {
                $g = $results->geometry->location;
                return new Location($g->lat, $g->lng);
            }
        }

        return null;
    }

    /**
     * @param $results
     * @return bool
     */
    protected function fullMatch($results)
    {
        return ! (property_exists($results, 'partial_match') && $results->partial_match);
    }
}