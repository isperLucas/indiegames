<?php
//CRIANDO A CLASSE DE CONEXAO
class Conexao{
	//ATRIBUTO PRIVADOS
	private $usuario;
	private $senha;
	private $banco;
	private $servidor;
	private static $pdo;
	//CONSTRUTOR
	public function __construct(){		
		$this->servidor = "localhost";
		$this->banco = "gw";
		$this->usuario = "root"; 
		$this->senha = "";
        $pdo = null;
	}
	//METODO PARA CONECTAR
	public function conectar(){
		try{
			if(is_null(self::$pdo)){
				self::$pdo = new PDO("mysql:host=".$this->servidor.";dbname=".$this->banco, $this->usuario, $this->senha);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			return self::$pdo;
		}catch(PDOException $e){
			echo 'Error: '.$e->getMessage();
		}
	}
}
?>