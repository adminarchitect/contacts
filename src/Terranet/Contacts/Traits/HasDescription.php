<?php

namespace Terranet\Contacts\Traits;

use Terranet\Contacts\Contacts;

trait HasDescription
{
    /**
     * Item description
     *
     * @var string
     */
    protected $description;

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set description
     *
     * @param $description
     * @return Contacts
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
}
