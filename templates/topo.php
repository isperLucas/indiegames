<!DOCTYPE html>
<html lang="en">
<head>
<title>IndieGames</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap Css -->
<link rel="stylesheet" href="bootstrap/dist/css/bootstrap.css" >    

<!-- Bootstrap JQuery -->
<script src="bootstrap/dist/js/jquery.js"></script>  

<!-- Bootstrap Java Script -->
<script src="bootstrap/dist/js/bootstrap.js"></script>    

<!-- Bootstrap Fonts --> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
<!-- Style Css -->   
<link rel="stylesheet" href="css/styles.css?uheu">
    
<!-- Scripts -->   
<script src="js/script.js"></script>
    
<link rel="shortcut icon" href="img/logov4.ico" type="image/x-icon" />    

<script async="async" src="https://www.googletagservices.com/tag/js/gpt.js"></script>

</head>
<body>
    <div id="bannerHome">
    <img class="img-responsive" src="img/logov4_capa2.png" >
    </div>

    <!-- Nav -->
    <nav class="navbar navbar-inverse" id="navBar">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                </button>
                <a class="navbar-static-top" href="#"><img  src="img/logov4.png"  height="52px"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="#">Início</a></li>
                    <li><a href="#">Sobre</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right" style="margin-right: 10px;">
                    <li id="btnModalCad" data-toggle="modal" data-target="#modalCad"><a href="#"><span class="glyphicon glyphicon-user"></span> Cadastrar</a></li>
                    <ul class="nav navbar-nav navbar-right">
                    <li id="btnModalLog" data-toggle="modal" data-target="#modalLog"><a href="#"><span class="glyphicon glyphicon-log-in"></span> Entrar</a></li>
                    </ul>
                </ul>    
            </div>
        </div>
    </nav><!--Nav -->
    
    <!-- Modal Cadastro-->
    <div class="modal fade" id="modalCad" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:35px 50px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5><span class="glyphicon glyphicon-lock"></span> Cadastro</h5>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <form role="form"  method="post" name="formu">
                        <div class="form-group">
                            <label for="usrname"><span class="glyphicon glyphicon-user"></span> Nome Completo:</label>
                            <input type="text" class="form-control" name="nome" id="usrname" placeholder="Nome">
                        </div>
                        <div class="form-group">
                            <label for="nickname"><span class="glyphicon glyphicon-user"></span> Nome de Usuário:</label>
                            <input type="text" class="form-control" name="nick" id="nickname" placeholder="Usuário">
                        </div>
                        <div class="form-group">
                            <label for="email"><span class="glyphicon glyphicon-envelope"></span> Email:</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Senha</label>
                            <input type="password" class="form-control" name="senha" id="psw" placeholder="password">
                        </div>
                        <div class="form-group">
                            <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>Confirmar Senha</label>
                            <input type="password" class="form-control" name="confirmarSenha" id="psw" placeholder="password">
                        </div>
                        <div class="form-group">
                            <button type="submit" onclick="return validar();" class="btn btn-default btn-block entrar" name="btnCadastro">  <span class="glyphicon glyphicon-off"></span> Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- .modal Cadastro -->

    <!-- Modal Login -->
    <div class="modal fade" id="modalLog" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:35px 50px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5><span class="glyphicon glyphicon-lock"></span> Entrar</h5>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <form role="form" method="post">
                        <div class="form-group">
                            <label for="usrname"><span class="glyphicon glyphicon-user"></span> Usuário</label>
                            <input type="text" class="form-control" name="emailUser_login" id="email_login" placeholder="Nome do Usuário">
                        </div>
                        <div class="form-group">
                            <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Senha</label>
                            <input type="password" class="form-control" name="senhaUser_login" id="senha_login" placeholder="Senha"> 
                            <div class="alert alert-danger alert-block alert-aling" role="alert" style="display:none" id="errorLogin">Ops! E-mail ou Senha estão errado</div>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="" checked>Lembrar de mim</label>
                        </div>
                        <span onclick="validacaoLogin();" name="btLogar" class="btn btn-default btn-block entrar"><span class="glyphicon glyphicon-off"></span> Entrar</span>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default pull-left cancelar" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                    <p>Não é um membro? <a href="#">Cadastre-se</a></p>
                    <p>Esqueceu a <a href="#">Senha?</a></p>
                </div>
            </div>
        </div>
    </div><!-- .modal Login --> 
 
    <script>
   $(document).scroll(function(){
        if($('#bannerHome').is(':appeared')){
            $("#navBar").removeClass("navbar-fixed-top");
        } else{
            $("#navBar").addClass("navbar-fixed-top");
        }
    });
          
   
    </script>        