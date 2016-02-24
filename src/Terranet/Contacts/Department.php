<?php

namespace Terranet\Contacts;

use Terranet\Contacts\Traits\HasDescription;
use Terranet\Contacts\Traits\HasLocation;

class Department
{
    use HasLocation, HasDescription;

    protected $name;

    protected $phones;

    protected $emails;

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getPhones()
    {
        return (array) $this->phones;
    }

    /**
     * @param array $phones
     * @return $this
     */
    public function setPhones(array $phones = [])
    {
        $this->phones = $this->prepareArrays($phones);

        return $this;
    }

    /**
     * @return array
     */
    public function getEmails()
    {
        return (array) $this->emails;
    }

    /**
     * @param array $emails
     * @return $this
     */
    public function setEmails(array $emails = [])
    {
        $this->emails = $this->prepareArrays($emails);

        return $this;
    }

    /**
     * Prepare arrays before accepting
     *
     * @param array $items
     * @return array
     */
    protected function prepareArrays(array $items = [])
    {
        $items = array_map(function ($item) {
            return trim($item);
        }, $items);

        return array_filter($items, function ($item) {
            return ! empty($item);
        });
    }
}
