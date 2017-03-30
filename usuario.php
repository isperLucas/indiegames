<?php include "templates/topoL.php"?>

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