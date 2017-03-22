<?php
//BUSCANDO AS CLASSES
require_once 'classes/usuario.class.php';
//ESTANCIANDO A CLASSES
$objUser = new Usuario();
//FAZENDO O LOGIN
$objUser->logaUsuario($_POST);
?>