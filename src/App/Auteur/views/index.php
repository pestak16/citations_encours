<?php



ob_start();

?>
<a href="/auteur/ajouter" class="btn btn-primary">Ajouter un auteur</a>
<div class="container cards">
    <?php foreach($data as $auteur): ?>
        <div class="card w-40 m-2 p-3">
            <h3><?= $auteur->auteur ?></h3>
            <div class="bio">
            <?= substr(htmlentities($auteur->bio),  0, 50) . '...' ?>
            </div>
            <div class="actions">
            <a href="/auteur/modifier/<?=  $auteur->id ?>">Mod</a>
                <a href="/auteur/supprimer/<?= $auteur->id  ?>">Supp</a>
                
            </div>
        </div>
    <?php endforeach ?>
</div>

<?php

$content = ob_get_clean();
require $template;