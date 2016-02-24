<?php

namespace Terranet\Contacts;

use Closure;
use Illuminate\Support\Collection;
use Terranet\Contacts\Traits\HasDescription;
use Terranet\Contacts\Traits\HasLocation;

class Contacts
{
    use HasLocation, HasDescription;

    /**
     * @var null|Collection
     */
    static protected $departments = null;


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

    /**
     * Render contacts page
     *
     * @return mixed
     */
    public function render()
    {
        return view('contacts::templates.' . config('contacts.template'))->with([
            'description' => $this->getDescription(),
            'location' => $this->getLocation(),
            'address' => $this->getAddress(),
            'departments' => $this->departments(),
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
