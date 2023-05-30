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
        $data  = $this->manager->findAll();
        $title = 'Mon super titre';
        $compact['title'] = $title;
        $compact['data'] = $data;
        $this->render($compact, 'index.php');
    }

    public function render($compact, string $view, string $template='default')
    {
        
        $template = ROOT . '/App/views/templates/' . $template . '.php';
        $title = $compact['title'];
        $data = $compact['data'];
        require_once ROOT . '/App/' . ucfirst($this->module) . '/views/' . $view;
    }


    public static function bidon(array $params)
    {
        dump($params);
    }
}


