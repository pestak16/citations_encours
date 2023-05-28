/*
$david = (new UtilisateurEntity())
    ->hydrate([
        'prenom'=>'david',
        'nom'=>'LEGRAND',
        'mail'=>'david.legrand.charente16@gmail.com',
        'mot_de_passe'=>'123456',
        'is_admin'=>true
    ]);
*/
//var_dump($david);
//dump($david->est_nouveau());
//$david->setIs_admin(false);
//dump($david->est_admin());

/*
$manager = new UtilisateurManager();
//$manager->create($david);
$david = $manager->find(1);
$david->setMot_de_passe('123456789');
$manager->update($david);
*/
/*
$manager = new UtilisateurManager();
$david = $manager->find(1);

dump($manager->delete(1));
*/