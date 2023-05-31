<?php



ob_start();

?>

<form action="/auteur/ajouter" method="post">
    <?php 
    $form = new Core\HTML\Form();
    $form->input('auteur');
    $form->textarea('bio');
    $form->submit('ajouter');
    ?>
</form>

<?php

$content = ob_get_clean();
require $template;