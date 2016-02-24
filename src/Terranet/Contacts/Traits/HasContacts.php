<?php

namespace Terranet\Contacts\Traits;

trait HasContacts
{
    /**
     * List of emails
     *
     * @var
     */
    protected $emails;

    /**
     * list of phones
     *
     * @var
     */
    protected $phones;

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