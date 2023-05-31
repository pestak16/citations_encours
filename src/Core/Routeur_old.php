<?php

namespace Core;

class Routeur
{

    /**
     * Réécrit l'URI de la requête et effectue une redirection si nécessaire.
     *
     * @return void
     */
    public function rewriteUri()
    {
        $uri = $_SERVER['REQUEST_URI'];
        // Vérifie si l'URI se termine par un slash et si elle n'est pas vide ni égale à '/'
        if ($uri[-1] == '/' && !empty($uri) && $uri != '/') {
            $uri = substr($uri, 0, -1);
            http_response_code(301);
            header('Location: ' . $uri);
        }
    }

    public function __construct()
    {
        $this->rewriteUri();
        $this->init();
    }

    public function init()
    {
        $token = uniqid();
        if (isset($_SESSION['token'])) {
            unset($_SESSION['token']);
        }
        $_SESSION['token'] = $token;

        $route = explode('/', $_GET['req']);

        $controller = array_shift($route);

        if ($controller === '') {
            (new \App\Citation\CitationController)->index();
        } else {
            $controllerName = '\App\\' . ucfirst($controller) . '\\' .  ucfirst($controller) . 'Controller';
            $method = array_shift($route);
            $method = is_null($method) ? 'index' : $method;
            $params = $route === null ? '' : $route;
            if (method_exists($controllerName, $method)) {
                $controller = new $controllerName;
                $controller->$method($params);
            } else {
                http_response_code(404);
                die('Mauvaise route');
            }
        }
    }

    public function initbaback()
    {
        $route = explode('/', $_GET['req']);
        $controller = array_shift($route);

        if ($controller === '') {
            (new \App\Citation\CitationController)->index();
        } else {
            $controllerName = '\App\\' . ucfirst($controller) . '\\' .  ucfirst($controller) . 'Controller';
            $method = array_shift($route);
            $method = is_null($method) ? 'index' : $method;
            $params = $route === null ? [] : $route;

            if (class_exists($controllerName)) {
                $controller = new $controllerName;

                if (method_exists($controller, $method)) {
                    call_user_func_array([$controller, $method], $params);
                } else {
                    http_response_code(404);
                    die('Mauvaise route');
                }
            } else {
                http_response_code(404);
                die('Mauvaise route');
            }
        }
    }

    /**
     * Initialise le routeur en appelant le contrôleur et la méthode appropriés en fonction de l'URI demandée.
     *
     * @return void
     */
    public function initdqgfrzehtr()
    {
        $route = explode('/', $_GET['req']);
        $controller = array_shift($route);

        $controllerName = ($controller === '') ? '\App\Citation\CitationController' : '\App\\' . ucfirst($controller) . '\\' . ucfirst($controller) . 'Controller';
        $method = array_shift($route) ?? 'index';
        $params = $route ?? [];

        if (!class_exists($controllerName) || !method_exists($controllerName, $method)) {
            http_response_code(404);
            die('Mauvaise route');
        }

        $controllerInstance = new $controllerName;
        call_user_func_array([$controllerInstance, $method], $params);
    }
}
