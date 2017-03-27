<!--Controles PHP-->
<?php
require_once 'classes/usuario.class.php';
$objUser = new Usuario();

if(isset($_POST['btnCadastro'])){
    $objUser->queryInsert($_POST);
}

include "templates/topo.php";

?>  

<!-- Content conteudo -->
<div class="container text-center">
  <div class="jumbotron">
    <h1>Indie Games</h1> 
    <p> Aqui você pode, postar e baixar jogos independentes de graça </p> 
  </div>
</div>

<div class="container-fluid text-center">
    <h3>Jogos em Destaque </h3>
    
    <div class="col-xs-12 col-sm-6 col-md-3">
        <div class="thumbnail">
            <a href="#"> 
                <img src="img/jogo1.png" class="img-responsive" style="width:100%" alt="Image"></img>
            <p>Aventura Selvagem</p></a>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-3">
        <div class="thumbnail">
         <a href="#"> 
             <img src="img/jogo2.png" class="img-responsive" style="width:100%" alt="Image"></img>
            <p>Mega Malarque</p></a> 
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-3">
        <div class="thumbnail">
             <a href="#"><img src="img/jogo3.png" class="img-responsive" style="width:100%" alt="Image"></img>
            <p>Labirinto Cinza</p></a> 
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-3">
        <div class="thumbnail">
             <a href="#"><img src="img/jogo3.png" class="img-responsive" style="width:100%" alt="Image"></img>
            <p>Labirinto Cinza</p></a> 
        </div>
    </div>
</div>



<?php include "templates/footer.php";?>