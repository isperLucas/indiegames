<?php 
include_once "classes/conexao.class.php";
$con = new Conexao();

session_start();

$uploaddir = 'usuarios/'.$_SESSION['id'].'/uf/';
$str =  basename($_FILES['imgInp']['name']);
$ext = explode(".", $str);
$ext = '.'.$ext[(count($ext)-1)];
$nome_img = $_SESSION['id']."_profile".$ext;
$uploadfile = $uploaddir . $nome_img;
unlink($uploaddir.$_SESSION['img_profile']);
$_SESSION['img_profile'] = $nome_img;
move_uploaded_file($_FILES['imgInp']['tmp_name'], $uploadfile);

$id = $_SESSION['id'];

$cst = $con->conectar()->prepare("UPDATE `Usuario` SET `img_profile` = :img_profile WHERE `id` = :id;");
$cst->bindParam(":id", $id, PDO::PARAM_INT);
$cst->bindParam(":img_profile", $nome_img, PDO::PARAM_STR);
$cst->execute();

$arr['img_profile'] = $uploadfile;

echo json_encode($arr);

?>