<?php

namespace Terranet\Contacts;

class Location
{
    protected $lat;

    protected $lng;

    public function __construct($lat, $lng)
    {
        $this->lat = $lat;
        $this->lng = $lng;
    }

    /**
     * @return mixed
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @return mixed
     */
    public function getLng()
    {
        return $this->lng;
    }

    public function toArray()
    {
        return [$this->getLat(), $this->getLng()];
    }
}
