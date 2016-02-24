<?php

namespace Terranet\Contacts;

use Closure;
use Illuminate\Support\Collection;
use Terranet\Contacts\Traits\HasContacts;
use Terranet\Contacts\Traits\HasDescription;
use Terranet\Contacts\Traits\HasLocation;

class Contacts
{
    use HasLocation, HasDescription, HasContacts;

    /**
     * @var null|Collection
     */
    static protected $departments = null;

    /**
     * Object title
     *
     * @var
     */
    protected $title;

    public function __construct($title = null)
    {
        $this->title = $title;
    }

    /**
     * Set item title
     *
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Register new department
     *
     * @param $name
     * @param Closure $callback
     * @return $this
     */
    public function department($name, Closure $callback)
    {
        $department = $this->createDepartment($name);

        call_user_func($callback, $department);

        if (is_null(static::$departments)) {
            static::$departments = Collection::make([]);
        }

        static::$departments->push($department);

        return $this;
    }

    /**
     * @param string $name
     * @return Contacts
     */
    protected function createDepartment($name)
    {
        return new Contacts($name);
    }

    /**
     * Render contacts page
     *
     * @return mixed
     */
    public function render()
    {
        return view('contacts::templates.' . config('contacts.template'))->with([
            'contacts' => $this
        ]);
    }

    /**
     * Fetch all departments
     *
     * @return Collection|null
     */
    public function departments()
    {
        return self::$departments;
    }
}
