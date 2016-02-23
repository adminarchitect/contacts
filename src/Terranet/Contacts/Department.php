<?php

namespace Terranet\Contacts;

class Department
{
    protected $name;

    protected $description;

    protected $address;

    protected $location;

    protected $phones;

    protected $emails;

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

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
     * @param array $phones
     * @return $this
     */
    public function setPhones(array $phones = [])
    {
        $this->phones = $phones;

        return $this;
    }

    /**
     * @param array $emails
     * @return $this
     */
    public function setEmails(array $emails = [])
    {
        $this->emails = $emails;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
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

    /**
     * @return mixed
     */
    public function getPhones()
    {
        return $this->phones;
    }

    /**
     * @return mixed
     */
    public function getEmails()
    {
        return $this->emails;
    }
}
