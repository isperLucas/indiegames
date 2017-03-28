<!DOCTYPE html>
	<html lang="en">
		<head>
		<title>Indie Games</title>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="img/logov4.ico" type="image/x-icon" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/styles.css?asd">
		<style>    
				
			
		</style>
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

			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> <img src="img/avatarexemplo.png" class="img-circle" height="21" width="21" alt="Avatar">  Minha Conta</a>
		
		<ul class="dropdown-menu">
          <li><a href="#">Perfil</a></li>
          <li><a href="#" data-toggle="modal" href="#myModal" id="modal">Configurações</a></li>
          <li><a href="#">Sair</a></li>
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
  <!-- MODAL -->


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
			<!-- Configurações de Conta -->
				<div id="home" class="tab-pane fade in active">
					<form class="form-inline">
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<label for="nomee">Nome</label>
								</div>
								<div class="col-sm-6">
									<input class="form-control" id="nomee" type="text">
								</div>
							</div>
						</div><br>
						<div class="form-group">
							<div class="row">
							<div class="col-sm-6">
								<label for="emaill">Email</label>
							</div>
								<div class="col-sm-6">
									<input class="form-control" id="emaill" type="text">
								</div>
							</div>
						</div><br>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<label for="datenasc">nascimento</label>
								</div>
								<div class="col-sm-6">
									<input class="form-control" id="datenasc" type="date" style="margin-left:-7px;">
								</div>
							</div>
						</div><br>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<label for="tel">Telefone</label>
								</div>
								<div class="col-sm-6">
									<input class="form-control" id="tel" type="text" style="margin-left:-7px;" maxlength="13">
								</div>
							</div>
						</div><br>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<label for="tel">Sexo</label>
								</div>
								<div class="col-sm-3 radio">
									<label><input type="radio" name="optradio">M</label>
									</div>
									<div class="col-sm-3 radio">
								  <label><input type="radio" name="optradio">F</label>
								</div>
							</div>
						</div><br>
					</form>
				</div>
				<!-- Configurações de Usuario -->
				<div id="menu1" class="tab-pane fade">
					<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>
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


  <!--SCRIPT MODAL -->
  <script>
$(document).ready(function(){
    $("#modal").click(function(){
        $("#myModal").modal();
    });
});
</script>