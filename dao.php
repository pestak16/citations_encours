<?php

$dao = new PDO('mysql:host=localhost;dbname=citations', 'root', '');
$dao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$dao->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAME utf8');

?>