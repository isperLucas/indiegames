<?php
//phpinfo();
$servername = "localhost";
$username = "root";
$password = "";
try{
$con = new PDO("mysql:host=$servername;dbname=gw", $username,$password);

$con ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Conexão bem sucessida";
}
catch(PDOException $e){
	echo "falha de conexão:". $e->getMessage();
}
?>