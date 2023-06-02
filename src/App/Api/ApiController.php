<?php

namespace App\API;

use App\Auteur\AuteurManager;
use App\Citation\CitationManager;
use Core\Database\Manager;
use stdClass;

class ApiController
{

    public function __construct()
    {
        //die('Controller API appelé');
    }

    public function getAuteurs()
    {
        $auteurs = (new AuteurManager())->findAll();
        $data = [];
        foreach ($auteurs as $item) {
            $auteur['id'] = $item->id;
            $auteur['auteur'] = $item->auteur;
            $auteur['bio'] = $item->bio;

            $data[] = $auteur;
        }

        $this->render($data);
    }

    public function getCitations()
    {
        $data = array();
        $citations = (new CitationManager())->findAll();
      


        foreach ($citations as $item) {
            $citation['id'] = $item->id;
            $citation['citation'] = $item->citation;
            $citation['explication'] = $item->explication;
            $citation['auteurs_id'] = $item->auteurs_id;

            if ($item->auteurs_id !== null) {
                $auteur = [];
                $auteur['id'] = $item->auteur->id;
                $auteur['auteur'] = $item->auteur->auteur;
                $auteur['bio'] = $item->auteur->bio;

                $citation['auteur'] = $auteur;
            }

            $data[] = $citation;
        }

       $this->render($data);
    }

    protected function render(array $data)
    {

        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        echo json_encode($data);
    }
    //  //a surveiller
}
