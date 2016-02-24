<?php

namespace Terranet\Contacts\Traits;

use Terranet\Contacts\Geocoder;
use Terranet\Contacts\Location;

trait HasLocation
{
    /**
     * Company location
     *
     * @var Location
     */
    protected $location;

    /**
     * Company address
     *
     * @var string
     */
    protected $address;

    /**
     * @param mixed $address
     * @param bool $enableGeoCoding
     * @return $this
     */
    public function setAddress($address, $enableGeoCoding = true)
    {
        $this->address = $address;

        if ($enableGeoCoding) {
            $this->geocodeAddress($address);
        }

        return $this;
    }

    /**
     * @param Location $location
     * @return $this
     */
    public function setLocation(Location $location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @param $address
     */
    protected function geocodeAddress($address)
    {
        if ($location = (new Geocoder($address))->getLocation()) {
            $this->setLocation($location);
        }
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }
}