<?php

namespace Core\Controllers;

use Core\Database\Manager;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Controller
{
    protected string $module;
    protected Manager $manager;

    protected $loader;
    protected $twig;

    public function __construct()
    {
        $model = get_called_class();
        $model = explode('\\', $model);
        $model = end($model);
        $model = str_replace('Controller', '', $model);
        $this->module = strtolower($model);
        $managerName = 'App\\' . ucfirst($this->module) . '\\' . ucfirst($this->module) . 'Manager';
        $this->manager = new $managerName();

        $this->loader = new FilesystemLoader(ROOT. '/App/views/templates');
        $this->twig = new Environment($this->loader);
    }

    public function index()
    {
        $data  = $this->manager->findAll();
        $title = 'Mon super titre';
        $compact['title'] = $title;
        $compact['data'] = $data;
       // $this->render($compact, 'index.php');

       $this->twig->display($this->module. '.index.twig', $compact);
    }

    

    public function render($compact, string $view, string $template='default')
    {
        
        $template = ROOT . '/App/views/templates/' . $template . '.php';
        $title = $compact['title'];
        $data = $compact['data'];
        require_once ROOT . '/App/' . ucfirst($this->module) . '/views/' . $view;
    }


    public function supprimer(array $data)
    {
        /* if (count($params) == 1 && is_int($params[0])) {
            $params = $params[0];
        } */
        $this->manager->delete($data[0]);
        header('Location: /' . $this->module);
    }
}


