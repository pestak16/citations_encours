<?php

$root = $_SERVER['DOCUMENT_ROOT'];
$root = str_replace('/public','',$root);



define('DEBUG',true);
define('WWW', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']);
define('FROM_INDEX', true); 