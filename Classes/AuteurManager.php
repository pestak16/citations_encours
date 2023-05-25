<?php
class AuteurManager
{
    protected PDO $db;
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Ajoute un Auteur en base de données
     *
     * @param AuteurEntity $auteur
     * @return void
     */
    public function create(AuteurEntity $auteur)
    {
        if (!$auteur->est_nouveau()) {
            trigger_error('Existe déjà', E_USER_ERROR);
        }
        $sql = 'INSERT INTO auteurs(auteur,bio) VALUES(:auteur, :bio)';
        $q = $this->db->prepare($sql);
        $q->bindValue(':auteur', $auteur->getAuteur());
        $q->bindValue(':bio', $auteur->getBio());
        try {
            $q->execute();
            $id = $this->db->lastInsertId();
            $auteur->hydrate(['id' => $id]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function find(int $id)
    {
        $sql = 'SELECT * FROM auteurs WHERE id=?';
        $q = $this->db->prepare($sql);
        $q->execute([$id]);
        $temp = $q->fetch(PDO::FETCH_ASSOC);
        return new AuteurEntity($temp);
    }


    /**
     * REnvoie une liste d'enrgitrement par critères
     *
     * @param array $data
     * @return array
     */
    public function findBy(array $data)
    {
        $champs = [];
        $valeurs = [];

        foreach($data as $key=>$value){
            $champs[] = $key . ' = ?';
            $valeurs[] = $value;
        }
        //WHERE truc=? AND bidule=?
        $sql = 'SELECT * FROM auteurs WHERE ' . implode(' AND ', $champs);
        $q = $this->db->prepare($sql);
        try{

            $q->execute($valeurs);
        }catch(Exception $e){
            echo $e->getMessage();
        }

        $auteurs = [];
        
       while($tuple = $q->fetch(PDO::FETCH_ASSOC)){
            $auteurs[] = new AuteurEntity($tuple);
       }
      return $auteurs;
    }

    /**
     * REtourne tous les auteurs 
     *
     * @return array
     */
    public function findAll():array
    {
        $q = $this->db->query('SELECT * FROM auteurs');
        return $q->fetchAll();

    }

    public function delete(AuteurEntity $auteur)
    {
        //Debug::var_dump($auteur);

        //DELETE FROM auteurs
        //WHERE
        $sql = 'DELETE FROM auteurs WHERE id=' . $auteur->getId();
       return $this->db->exec($sql);

    }

    public function update(AuteurEntity $auteur)
    {
        //UPDATE auteurs SET champs1=?, champs2=? WHERE id= ?
        //execute([])
        $sql = 'UPDATE auteurs SET  auteur = :auteur, bio= :bio WHERE id=:id';
        $q = $this->db->prepare($sql);
        $q->bindValue(':auteur', $auteur->getAuteur(), PDO::PARAM_STR);
        $q->bindValue(':bio', $auteur->getBio(), PDO::PARAM_STR);
        $q->bindValue(':id', $auteur->getId(), PDO::PARAM_INT);

        try{
            $q->execute();
            return $this->find($auteur->getId());
        }catch(Exception $e){
            echo $e->getMessage();
        }

    }
}
