<?php

namespace App\Models;
use \Core\Models\Model;
use \DateTime;

class AuteursModel extends Model
{
    private int $id;
    private string $auteur;
    private string $bio;
    private DateTime $date_modif;

    public function __construct()
    {
        $this->table = 'auteurs';
    }

	/**
	 * @return int
	 */
	public function getId(): int {
		return $this->id;
	}
	
	/**
	 * @param int $id 
	 * @return self
	 */
	public function setId(int $id): self {
		$this->id = $id;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getAuteur(): string {
		return $this->auteur;
	}
	
	/**
	 * @param string $auteur 
	 * @return self
	 */
	public function setAuteur(string $auteur): self {
		$this->auteur = $auteur;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getBio(): string {
		return $this->bio;
	}
	
	/**
	 * @param string $bio 
	 * @return self
	 */
	public function setBio(string $bio): self {
		$this->bio = $bio;
		return $this;
	}

	/**
	 * @return DateTime
	 */
	public function getDate_modif(): DateTime {
		return $this->date_modif;
	}
	
	/**
	 * @param DateTime $date_modif 
	 * @return self
	 */
	public function setDate_modif(DateTime $date_modif): self {
		$this->date_modif = $date_modif;
		return $this;
	}
}

