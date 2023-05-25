<?php
require_once ROOT . '/conf/bdd.php';

$dsn = 'mysql:host=' . DB_HOST . '; dbname=' . DB_NAME;
$dao = new PDO($dsn, DB_USER,  DB_PASS);
if(DEBUG){
    $dao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}else{
    $dao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
}

$dao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$dao->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAME utf8');

?>