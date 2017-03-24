<?php
//BUSCANDO AS CLASSES
require_once 'classes/usuario.class.php';
//ESTANCIANDO 
$objFunc = new Usuario();
//VALIDANDO USUARIO
session_start();
if($_SESSION["logado"] == "sim"){
	$objFunc->UserLogado($_SESSION['user']);
}else{
	header("location: index.php"); 
}

if(isset($_GET['sair']) == "sim"){
	$objFunc->sairUser();
}


echo $_SESSION['nome'];
?>

<form method="get">
<button name="sair">Sair</button>
</form>