<?php

namespace Terranet\Contacts;

use Closure;
use Illuminate\Support\Collection;

class Contacts
{
    /**
     * @var null|Collection
     */
    static protected $departments = null;

    /**
     * About company
     *
     * @var string
     */
    protected $about;

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

    public function setAbout($about)
    {
        $this->about = $about;

        return $this;
    }

    /**
     * Set main address
     *
     * @param $address
     * @param bool $enableGeoCoding
     * @return $this
     */
    public function setAddress($address, $enableGeoCoding = true)
    {
        $this->address = $address;

        if ($enableGeoCoding)
            $this->geocodeAddress($address);

        return $this;
    }

    /**
     * Geocode address to coordinates
     *
     * @param $address
     */
    protected function geocodeAddress($address)
    {
        if ($location = (new Geocoder($address))->getLocation()) {
            $this->setLocation($location);
        }
    }

    public function setLocation(Location $location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Register new department
     *
     * @param $name
     * @param Closure $callback
     * @return $this
     */
    public function create($name, Closure $callback)
    {
        $department = $this->createDepartment($name);

        call_user_func($callback, $department);

        if (is_null(static::$departments)) {
            static::$departments = Collection::make([]);
        }

        static::$departments->push($department);

        return new self;
    }

    /**
     * @param string $name
     * @return Department
     */
    protected function createDepartment($name)
    {
        return new Department($name);
    }

    public function lists()
    {
        return self::$departments;
    }
}
