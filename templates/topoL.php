<?php
//BUSCANDO AS CLASSES
require_once 'classes/usuario.class.php';
require_once 'classes/conexao.class.php';
//ESTANCIANDO 
$objFunc = new Usuario();
$con = new Conexao();
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

//SESSIONS
$email = $_SESSION['user'];
try{
    $cst = $con->conectar()->prepare("SELECT `id`, `nick`, `dt_nasc`, `dt_cadastro`, `img_profile` FROM `usuario` WHERE `email` = :email;");
    $cst->bindParam(':email', $email, PDO::PARAM_STR);
    $cst->execute();
        $rst = $cst->fetch();
        $_SESSION['id'] = $rst['id'];
        $_SESSION['nick'] = $rst['nick'];
        $_SESSION['dt_nasc'] = $rst['dt_nasc'];;
        $_SESSION['nick'] = $rst['nick'];
        $_SESSION['img_profile'] = $rst['img_profile'];

}catch(PDOException $e){
    return 'Error: '.$e->getMassage();
}

?>
	<html lang="en">
		<head>
				<title>Indie Games</title>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="logov4.ico" type="image/x-icon" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="js/script.js?asases"></script>
		</head>
			<body>
								<!-- MENU -->
				<nav class="navbar navbar-inverse ">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>                        
							</button>
							
							<a class="navbar-static-top" href="#"><img  src="img/logov4.png"   height="52px"  > </a>
							</div>
					<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						<li><a href="#">  Início</a></li>
			
							<!-- <li class="navbar-form " ><img  src="logov4.png"  height="36px"  ></img></li> -->
							</ul>
							<ul class="nav navbar-nav navbar-right">
													<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-globe"></span> Notificações</a><ul class="dropdown-menu">
          <li><a href="#">Avaliação (2)</a></li>
          <li><a href="#">Comentarios (1) </a></li>
          <li><a href="#">Seguindo (3)</a></li>
        </ul>
      </li>

			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> <img src="<?php echo "usuarios/".$_SESSION['id']."/uf/".$_SESSION['img_profile']; ?>" class="img-circle" height="21" width="21" alt="Avatar" id="icone_profile"><?php echo $_SESSION['nome']; ?></a>	
           
            <ul class="dropdown-menu">
              <li><a href="#">Perfil</a></li>
              <li><a href="#" data-toggle="modal" href="#myModal" id="modal">Configurações</a></li>
                <form method="get">     
                  <li><button class="btn btn-primary" name="sair">Sair</button></li>
                </form>
            </ul>
          </li>


          </ul><center>
      
      <form class="navbar-form " role="search">
        <div class="form-group input-group">
          <input type="text" class="form-control" placeholder="Procurar...">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </span>        
        </div>
      </form></center>
			
    </div>
  </div>
  </nav>
  <div class="container">
  
  
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
 
      <div class="modal-content">
        <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h3>Pagina de configuração</h3>
		</div>
          <div class="modal-body">
          
		  <div class="container">
			<h4>Configurações</h4>
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#home">Usuario</a></li>
				<li><a data-toggle="tab" href="#menu1">Conta</a></li>
   
			</ul>
			
			<div class="tab-content">
			<!-- Configurações de Usuario -->
				<div id="home" class="tab-pane fade in active">
					<form class="form-inline">
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<label for="nomee">Nome: </label>
								</div>
								<div class="col-sm-6">
									<input class="form-control" id="nomee" type="text">
								</div>
							</div>
						</div><br>
						<div class="form-group">
							<div class="row">
							<div class="col-sm-6">
								<label for="emaill">Email: </label>
							</div>
								<div class="col-sm-6">
									<input class="form-control" id="emaill" type="text">
								</div>
							</div>
						</div><br>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<label for="datenasc">nascimento: </label>
								</div>
								<div class="col-sm-6">
									<input class="form-control" id="datenasc" type="date" style="margin-left:-7px;">
								</div>
							</div>
						</div><br>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<label for="tel">Telefone: </label>
								</div>
								<div class="col-sm-6">
									<input class="form-control" id="tel" type="text" style="margin-left:-7px;" maxlength="13">
								</div>
							</div>
						</div><br>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-4">
									<label for="tel">Sexo: </label>
								</div>
								<div class="col-sm-4 radio">
									<label><input type="radio" name="optradio">M</label>
									</div>
									<div class="col-sm-4 radio">
								  <label><input type="radio" name="optradio">F</label>
								</div>
							</div>
						</div><br>
						<button type="button" class="btn btn-success">Salvar</button>
					</form>
				</div>
				<!--</onfiguração de conta>-->
				<!-- Configurações de Usuario -->
				
						<div id="menu1" class="tab-pane fade">
				
							<div class="panel-group" id="accordion">
								<div class="row">
									<div class="col-sm-4">
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Username:</a>
												</h4>
											</div>
										</div>
										 <div id="collapse1" class="panel-collapse collapse in">
											<div class="panel-body"><p>Nome de usuário:</p>
												<input type="text" class="form-control"></div>
										 </div>
									 </div>
								</div>
								<div class="row">
									<div class="col-sm-4">
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title">
												<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Senha</a>
												</h4>
											</div>
										 
											<div id="collapse2" class="panel-collapse collapse">
												<div class="panel-body">
													<button type="button" class="btn btn-md btn-info collapsed" data-toggle="collapse" data-target="#demo">		Alterar senha
													</button>
													<div id="demo" class="collapse">
														<div class="row">
															<div class="col-sm-6"><small>Confirme a senha antiga:</small>
																<input type="password" class="form-control" name="senha">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4">
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Excluir conta</a>
												</h4>
											</div>
											<div id="collapse3" class="panel-collapse collapse">
												<div class="panel-body">você tem certeza que deseja excluir sua conta ?<br>
												<a href="#">Excluir</a></div>
											</div>
										</div>
									</div>
								</div>
							</div> 
					<!-- </configuraões de conta>-->
					
					
				</div>
			</div>
		</div> 
        </div>
     
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

   <script>
$(document).ready(function(){
    $("#modal").click(function(){
        $("#myModal").modal();
    });
});
</script>