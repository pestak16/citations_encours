<?php namespace Core;




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
       if($uri[-1]=='/' && !empty($uri) && $uri!='/'){
        $uri = substr($uri, 0, -1);
        
                
        http_response_code(301);
        header('Location: '.$uri);

       }


    }
}