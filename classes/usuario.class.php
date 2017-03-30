<?php
//BUSCANDO AS CLASSES
include_once "classes/conexao.class.php";
//CRIANDO A CLASSE

class Usuario {
    
    private $con;
    private $objfc;
    private $id;
    private $nome;
    private $nick;
    private $dt_nasc;
    private $email;
    private $senha;
    private $dt_cadastro;
    
    public function __construct(){
        $this->con = new Conexao();
    }
    
    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }
    public function __get($atributo){
        return $this->$atributo;
    }
    
    public function querySeleciona($dado){
        try{
            $this->id = $this->objuser->base64($dado, 2);
            $cst = $this->con->conectar()->prepare("SELECT id, nome, nick, dt_nasc, email, senha, dt_cadastro FROM `Usuario` WHERE `id` = :idUser;");
            $cst->bindParam(":idUser", $this->id, PDO::PARAM_INT);
            $cst->execute();
            return $cst->fetch();
        } catch (PDOException $ex) {
            return 'error '.$ex->getMessage();
        }
    }
    
    public function querySelect(){
        try{
            $cst = $this->con->conectar()->prepare("SELECT id, nome, nick, dt_nasc, email, senha, dt_cadastro FROM `Usuario`;");
            $cst->execute();
            return $cst->fetchAll();
        } catch (PDOException $ex) {
            return 'erro '.$ex->getMessage();
        }
    }
    
    public function queryInsert($dados){
        try{
            $this->nome = $dados['nome'];
            $this->nick= $dados['nick'];
            $this->email = $dados['email'];
            $this->senha = sha1($dados['senha']);
            $this->dt_cadastro = date('d/m/Y');
            $con = $this->con->conectar();
            $cst = $con->prepare("INSERT INTO `usuario` (nome, nick, email, senha, dt_cadastro) VALUES (:nome, :nick, :email, :senha, :dt_cadastro);");
            $cst->bindParam(":nome", $this->nome);
            $cst->bindParam(":nick", $this->nick);
            $cst->bindParam(":email", $this->email);
            $cst->bindParam(":senha", $this->senha);
            $cst->bindParam(":dt_cadastro", $this->dt_cadastro);
            $cst->execute();
            
            $idUser = $con->lastInsertId(); 
            
            $_SESSION['id'] = $idUser;
            mkdir("usuarios/".$_SESSION['id']."/uf", 0777, true);
            
            header('location: usuario.php');
            
        } catch (PDOException $ex) {
            echo 'error '.$ex->getMessage();
            exit;
        }
    }
    
    public function queryUpdate($dados){
        try{
            $this->id = $dados['id'];
            $this->nome = $dados['nome'];
            $this->email = $dados['email'];
            $cst = $this->con->conectar()->prepare("UPDATE `Usuario` SET  `nome` = :nome, `email` = :email WHERE `id` = :id;");
            $cst->bindParam(":id", $this->idFuncionario, PDO::PARAM_INT);
            $cst->bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $cst->bindParam(":email", $this->email, PDO::PARAM_STR);
            if($cst->execute()){
                return 'ok';
            }else{
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error '.$ex->getMessage();
        }
    }
    
    public function queryDelete($dado){
        try{
            $this->id = $dado;
            $cst = $this->con->conectar()->prepare("DELETE FROM `Usuario` WHERE `id` = :id;");
            $cst->bindParam(":id", $this->id, PDO::PARAM_INT);
            if($cst->execute()){
                return 'ok';
            }else{
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error'.$ex->getMessage();
        }
    }
    
    //METODOS

	 public function logaUsuario($dados){

		$this->email = $dados['emailUser_login'];
		$this->senha = sha1($dados['senhaUser_login']);
		try{
			$cst = $this->con->conectar()->prepare("SELECT `email`, `senha` FROM `usuario` WHERE `email` = :email AND `senha` = :senha;");
			$cst->bindParam(':email', $this->email, PDO::PARAM_STR);
			$cst->bindParam(':senha', $this->senha, PDO::PARAM_STR);
			$cst->execute();
			if($cst->rowCount() == 0){
                $arr = array('error' => "1");
                echo json_encode($arr);
			}else{
				session_start();
				$rst = $cst->fetch();
				$_SESSION['logado'] = "sim";
				$_SESSION['user'] = $rst['email'];
                $arr = array('error' => 0);
                echo json_encode($arr);
			}
		}catch(PDOException $e){
			return 'Error: '.$e->getMassage();
        }
	}
	
    function UserLogado($dado){
		$cst = $this->con->conectar()->prepare("SELECT `nome`, `email` FROM `usuario` WHERE `email` = :email");
		$cst->bindParam(':email', $dado, PDO::PARAM_INT);
		$cst->execute();
		$rst = $cst->fetch();
		$_SESSION['nome'] = $rst['nome'];
	}
	
	function sairUser(){
		session_destroy();
		header ('location: index.php');
	}
    
}
?>