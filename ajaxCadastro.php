<?php
    include_once "classes/conexao.class.php";
    $con = new Conexao();

    $email = $_POST['emailUser_cadastro'];
    try{
        $cst = $con->conectar()->prepare("SELECT email FROM `Usuario` WHERE `email` = :email;");
        $cst->bindParam(":email", $email, PDO::PARAM_INT);
        $cst->execute();
        if($cst->rowCount() == 0){
            $arr = array('error' => 0);
            echo json_encode($arr);
        }else{
            $arr = array('error' => 1);
            echo json_encode($arr);
        }
    } catch (PDOException $ex) {
        return 'erro '.$ex->getMessage();
    }

?>