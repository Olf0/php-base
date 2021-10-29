<?php

$base = $_SERVER['HTTP_HOST']=='localhost'? '' : APP_FOLDER;

$home = $_SERVER['HTTP_HOST']=='localhost'? 'http://localhost/' :
        (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http') .
        "://" . $_SERVER['SERVER_NAME'] . '/' . $base;

$rutas = array();


#Workaround para problemas de Apache en Docker (no me toma el mime type)
#$local = $_SERVER['HTTP_HOST']=='localhost'? 'http://190.210.101.237/haberes/views' : $home.'App/Views';
#define('WWW_TEMPLATES', $local);

define('WWW_TEMPLATES', $home.'App/Views');

?>
