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
              <li><a href="#">Configurações</a></li>
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
								<!-- LADO ESQUERDO -->
<div class="container text-center">    
  <div class="row">
    <div class="col-sm-3 well">
      <div class="well">
        <p><a href="#">Meu perfil</p>
        <?php
        $localft = "usuarios/".$_SESSION['id']."/uf/".$_SESSION['img_profile'];?>
        <img src="<?php
                    if(file_exists($localft)){
                        echo $localft;
                    }else{
                        echo "img/perfilDefault.jpg";
                    }                     
                  
                  ?>" id="imgPerfil" class="img-circle" height="65" width="65" alt="Avatar">    
       <br>    
        <button onClick="carregaImg()" type="button" class="btn btn-xs btn-info btn-lg" data-toggle="modal" data-target="#modalFT_perfil">Carregar foto</button>    
      </div>
        <!-- Modal foto perfil-->
        <div id="modalFT_perfil" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <form method="post" enctype="multipart/form-data" id="form_ftPerfil">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Carregar foto de perfil</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                          <img id="blah" src="<?php echo "usuarios/".$_SESSION['id']."/uf/".$_SESSION['img_profile']; ?>" alt="your image" accept='image/*' width="250px">
                        </div>
                        <input class="btn btn-primary" type='file' name="imgInp" id="imgInp">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-info" class="attFoto" type="submit">Atualizar foto</button>
                    </div>
                </form>  
            </div>
          </div>
        </div>
      <div class="well">
        <p><a href="#">Biografia</a></p>
        <p>
          Criador de jogos independentes desde 2012
        </p>
      </div>
      <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <p><strong>Você tem novas notificações</strong></p>
        
      </div>
      <p><a href="#">Adicione um link</a></p>
      <p><a href="#">Adicione um link</a></p>
      <p><a href="#">Adicione um link</a></p>
	  
	  <br>
	  
	  
	  <a href="#"><div class="well col-sm-6">
         <p>Seguindo</p>
		<p><strong>67</strong></p>
      </div></a>
      <a href="#"><div class="well col-sm-6">
        <p>Seguidores</p>
		<p><strong>51</strong></p>
      </div></a>
	  
    </div>
	
	
	
	
				<!-- MEIO -->
    <div class="col-sm-6">
    
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-default text-left">
            <div class="panel-body">
             <div class="form-group">
		<label for="comment">Publique algo:</label>
			<textarea class="form-control" rows="5" id="comment"></textarea>
				</div>
                
				<button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-new-window"></span> Publicar
              </button>
            </div>
          </div>
        </div>
      </div>
      
     <div class="col-sm-12">
          <div class="panel panel-default">
            <div class="panel-body">
        <a href="#"><div class="col-sm-3">
          <div class="well">
           <p>Jonas</p>
           <img src="img/avatarexemplo.png" class="img-circle" height="55" width="55" alt="Avatar">
         </div>
         </a></div>
        <div class="col-sm-9">
          <div class="well">
            <p>Doom entrou no túnel do tempo para pousar diretamente em 2016. Um dos games de tiro mais famosos do mundo está de volta nos títulos da geração atual, e você já pode experimentar essa novidade diretamente no seu computador.</p>
          </div>
        </div>
      </div>
	  </div>
	  </div>
	  
	  
	  
	   <div class="col-sm-12">
          <div class="panel panel-default">
            <div class="panel-body">
        <a href="#"><div class="col-sm-3">
          <div class="well">
           <p>Jonas</p>
           <img src="img/avatarexemplo.png" class="img-circle" height="55" width="55" alt="Avatar">
         </div>
         </a></div>
        <div class="col-sm-9">
          <div class="well">
            <p>Doom entrou no túnel do tempo para pousar diretamente em 2016. Um dos games de tiro mais famosos do mundo está de volta nos títulos da geração atual, e você já pode experimentar essa novidade diretamente no seu computador.</p>
          </div>
        </div>
      </div>
	  </div>
	  </div>
	  
	  
 <div class="col-sm-12">
          <div class="panel panel-default">
            <div class="panel-body">
        <a href="#"><div class="col-sm-3">
          <div class="well">
           <p>Jonas</p>
           <img src="img/avatarexemplo.png" class="img-circle" height="55" width="55" alt="Avatar">
         </div>
         </a></div>
        <div class="col-sm-9">
          <div class="well">
            <p>Doom entrou no túnel do tempo para pousar diretamente em 2016. Um dos games de tiro mais famosos do mundo está de volta nos títulos da geração atual, e você já pode experimentar essa novidade diretamente no seu computador.</p>
          </div>
        </div>
      </div>
	  </div>
	  </div>
	  
	  
	   <div class="col-sm-12">
          <div class="panel panel-default">
            <div class="panel-body">
        <a href="#"><div class="col-sm-3">
          <div class="well">
           <p>Jonas</p>
           <img src="img/avatarexemplo.png" class="img-circle" height="55" width="55" alt="Avatar">
         </div>
         </a></div>
        <div class="col-sm-9">
          <div class="well">
            <p>Doom entrou no túnel do tempo para pousar diretamente em 2016. Um dos games de tiro mais famosos do mundo está de volta nos títulos da geração atual, e você já pode experimentar essa novidade diretamente no seu computador.</p>
          </div>
        </div>
      </div>
	  </div>
	  </div>
	  
	   <div class="col-sm-12">
          <div class="panel panel-default">
            <div class="panel-body">
        <a href="#"><div class="col-sm-3">
          <div class="well">
           <p>Jonas</p>
           <img src="img/avatarexemplo.png" class="img-circle" height="55" width="55" alt="Avatar">
         </div>
         </a></div>
        <div class="col-sm-9">
          <div class="well">
            <p>Doom entrou no túnel do tempo para pousar diretamente em 2016. Um dos games de tiro mais famosos do mundo está de volta nos títulos da geração atual, e você já pode experimentar essa novidade diretamente no seu computador.</p>
			
          </div>
        </div>
      </div>
	  </div>
	  </div>
	  

	 
	  
	  
    
    </div>
	
	<!-- LADO DIREITO -->
    <div class="col-sm-3 well">
      <div class="thumbnail">
        <p>Recomendado</p>
        <img src="img/jogo2.png"  width="400" height="300">
        <p><strong>Mega Malarque</strong></p>
        <p>20 mar. 2017</p>
        <button class="btn btn-primary">Descrição</button>
      </div>      
	  <br>
	  <p><h4>Recomendados</h4></p>
      <a href="#"><div class="well col-sm-6">
         <p>AnaGames</p>
		<p><img src="img/avatarexemplo2.png" class="img-circle" height="45" width="45" alt="Avatar"></p>
      </div></a>
      <a href="#"><div class="well col-sm-6">
        <p>Rafael_java</p>
		<p><img src="img/avatarexemplo3.png" class="img-circle" height="45" width="45" alt="Avatar"></p>
      </div></a>
	  
	  <a href="#"><div class="well col-sm-6">
         <p>SophiaGamer</p>
		<p><img src="img/avatarexemplo4.png" class="img-circle" height="45" width="45" alt="Avatar"></p>
      </div></a>
      <a href="#"><div class="well col-sm-6">
        <p>AnaGames</p>
		<p><img src="img/avatarexemplo2.png" class="img-circle" height="45" width="45" alt="Avatar"></p>
      </div></a>
	  
    </div>
  </div>
</div>
        
<?php include "templates/footer.php" ?>
        
<script>

    $("#imgInp").change(function(){
    readURL(this);
});
        $("#form_ftPerfil").submit(function (e) {
            e.preventDefault();
                var formData = new FormData(this);

    $.ajax({
        url: "ajaxUploadFt.php",
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function (data) {
            $('#imgPerfil').attr('src', data.img_profile+"?img="+(Math.random().toString(36).substr(2, 9)));
            $('#icone_profile').attr('src', data.img_profile+"?img="+(Math.random().toString(36).substr(2, 9)));
            $('#modalFT_perfil').modal('hide');
            
            
        },
        cache: false,
        contentType: false,
        processData: false,
        xhr: function() {  // Custom XMLHttpRequest
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                myXhr.upload.addEventListener('progress', function (evt) {
                    console.log(evt.lengthComputable); // false
                    if (evt.lengthComputable) {
                        var percentComplete = evt.loaded / evt.total;
                       console.log(Math.round(percentComplete * 100) + "%");
                    }
                }, false);
            }
        return myXhr;
        }
    });

});

</script>        

</body>
</html>