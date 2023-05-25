<?php

class UtilisateurEntity
{
    private int|null $id=null;
    private string|null $prenom=null;
    private string|null $nom=null;
    private string|null $mail=null;
    private string|null $mot_de_passe=null;
    private string|null $date_modif=null;
    private string|null $token = null;

    private bool $is_admin = false;


    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    /**
     * REtourn si l'utilisateur a été enregistré
     *
     * @return boolean
     */
    public function est_nouveau():bool
    {
        return !is_null($this->id);
    }

    /**
     * 
     *
     * @return boolean
     */
    public function est_admin():bool
    {
        return $this->getIs_admin();
    }

    /**
     * Undocumented function
     *
     * @param array $data
     * @return self
     */
    public function hydrate(array $data):self
    {
        foreach($data as $key=>$value){
            $method = 'set' . ucfirst($key);
            if(method_exists(__CLASS__, $method)){
                $this->$method($value);
            }else{
                trigger_error('L\'attribut ' . $key .' n\'esite pas', E_USER_WARNING );
            }
        }
        return $this;
    }
    

	/**
	 * @return |null
	 */
	public function getId(): int|null {
		return $this->id;
	}
	
	/**
	 * @param int $id 
	 * @return self
	 */
	public function setId(int $id): self {
        if($id<=0) trigger_error('Doit être strictement positif', E_USER_ERROR);
        if(!$this->est_nouveau()) trigger_error('id déjà existant', E_USER_ERROR);
		$this->id = $id;
		return $this;
	}

	/**
	 * @return |null
	 */
	public function getPrenom(): string|null {
		return $this->prenom;
	}
	
	/**
	 * @param |null $prenom 
	 * @return self
	 */
	public function setPrenom(string|null $prenom): self {
		$this->prenom = $prenom;
		return $this;
	}

	/**
	 * @return |null
	 */
	public function getNom(): string|null {
		return $this->nom;
	}
	
	/**
	 * @param |null $nom 
	 * @return self
	 */
	public function setNom(string|null $nom): self {
		$this->nom = $nom;
		return $this;
	}

	/**
	 * @return |null
	 */
	public function getMail(): string|null {
		return $this->mail;
	}
	
	/**
	 * @param |null $mail 
	 * @return self
	 */
	public function setMail(string $mail): self {
        if(empty($mail)) trigger_error('Ne doit pas être vide', E_USER_ERROR);
        if(strlen($mail)>320) trigger_error('Pas plus e 320 caractères', E_USER_ERROR);
		$this->mail = $mail;
		return $this;
	}

	/**
	 * @return |null
	 */
	public function getMot_de_passe(): string|null {
		return $this->mot_de_passe;
	}
	
	/**
	 * @param |null $mot_de_passe 
	 * @return self
	 */
	public function setMot_de_passe(string $mot_de_passe): self {
		$this->mot_de_passe = $mot_de_passe;
		return $this;
	}

	/**
	 * @return |null
	 */
	public function getDate_modif(): string|null {
		return $this->date_modif;
	}
	
	/**
	 * @param  $date_modif 
	 * @return self
	 */
	public function setDate_modif(string $date_modif): self {
		$this->date_modif = $date_modif;
		return $this;
	}

	/**
	 * @return |null
	 */
	public function getToken(): string|null {
		return $this->token;
	}
	
	/**
	 * @param  $token 
	 * @return self
	 */
	public function setToken(string $token): self {
		$this->token = $token;
		return $this;
	}

	/**
	 * @return 
	 */
	public function getIs_admin(): bool {
		return $this->is_admin;
	}
	
	/**
	 * @param  $admin 
	 * @return self
	 */
	public function setIs_admin(bool $admin): self {
		$this->is_admin = $admin;
		return $this;
	}
}