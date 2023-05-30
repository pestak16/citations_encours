<?php

namespace Core;

use Core\Database\Manager;

class Controller
{
    protected string $module;
    protected Manager $manager;

    public function __construct()
    {
        $model = get_called_class();
        $model = explode('\\', $model);
        $model = end($model);
        $model = str_replace('Controller', '', $model);
        $this->module = strtolower($model);
        $managerName = 'App\\' . ucfirst($this->module) . '\\' . ucfirst($this->module) . 'Manager';
        $this->manager = new $managerName();
    }

    public function index()
    {
    }
}
