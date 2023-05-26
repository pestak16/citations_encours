<?php
namespace App\Auteur;
use Core\Entity;
class AuteurEntity extends Entity
{
    private  int|null $id=null;
    private string|null $auteur=null;
    private string|null $bio=null;
    private string|null $date_modif=null;


    public function __construct(array $data=null)
    {
        if(!is_null($data)){
            $this->hydrate($data);
        }
        
    }
    public function hydrate(array $data):self
    {
        foreach($data as $key=>$value)
        {
           $method = 'set' . ucfirst($key);
           if(method_exists(__CLASS__, $method)){
                $this->$method($value);
           }

        }
        return $this;
    }

    function est_nouveau():bool{
       return !isset($this->id);
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function setId($id): self
    {
        if($id <=0) {
            trigger_error('Un N+ est attendu', E_USER_ERROR);
        }
        $this->id = $id;
        return $this;
    }

    public function getAuteur(): string
    {
        return $this->auteur;
    }

    public function setAuteur(string $auteur): self
    {
        if(strlen($auteur)>63) {
            trigger_error('Trop long (63 max)', E_USER_ERROR);
        }
        if(empty($auteur)) {
            trigger_error('chaine vide', E_USER_ERROR);
        }
        $this->auteur = $auteur;
        return $this;
    }

    public function getBio():string|null
    {
        return $this->bio;
    }

    public function setBio($bio):self
    {
        $this->bio = $bio;
        return $this;
    }

    public function getDate_modif():string{
        return $this->date_modif;
    }

    public function setDate_modif(string $date):self
    {
        $this->date_modif = $date;
        return $this;
    }
}

