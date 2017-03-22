// Valida Login
function validacaoLogin(){
    $('#errorLogin').hide();
    
    var email = $('#email_login').val();
    var senha = $('#senha_login').val();

    var request = $.ajax({
        url: "ajaxLogin.php",
        method: "POST",
        data: { emailUser_login : email, senhaUser_login : senha},
        dataType: "json"
    });
    
    request.done(function( data ) {
        if(data.error){
          $('#errorLogin').fadeIn();
        }else{
          window.location = "usuario.php";
        }
    }); 

}

// Valida Cadastro
function validar(){
	if (document.formu.nome.value==""){
		alert("campo nome é obrigatório");
		document.formu.nome.focus();
		return false;
	}
	else if (document.formu.nome.value.length<4){
		alert("O campo nome deve conter no mínimo 4 caracteres.");
		document.formu.nome.focus();
		return false;
	}
	else if(document.formu.nick.value==""){
		alert("campo nick obrigatório");
		document.formu.nick.focus();
		return false;
		
	}
	else if (document.formu.nick.value.length<5){
		alert("o campo nick deve conter no mínimo 5 dígitos");
		document.formu.nick.focus();
		return false;
		
	}
	else if (document.formu.email.value==""){
		alert("Campo email obrigatório");
		document.formu.email.focus();
		return false;
	}
	else if (document.formu.senha.value=="" || document.formu.senha.value.length<5){
		alert("A senha deve conter no mínimo 5 dígitos");
		document.formu.senha.focus();
		return false;
	}else if (document.formu.confirmarSenha.value==""){
		alert("Confirme a senha!");
		document.formu.confirmarSenha.focus();
		return false;
		
	}
	else if (document.formu.senha.value != document.formu.confirmarSenha.value){
		alert("As senhas devem ser iguais");
		document.formu.confirmarSenha.focus();
		return false
		
	}else {
		return true;
	}
}

/*
 * jQuery appear plugin
 *
 * Copyright (c) 2012 Andrey Sidorov
 * licensed under MIT license.
 *
 * https://github.com/morr/jquery.appear/
 *
 * Version: 0.3.6
 */

(function($) {
  var selectors = [];

  var check_binded = false;
  var check_lock = false;
  var defaults = {
    interval: 250,
    force_process: false
  };
  var $window = $(window);

  var $prior_appeared = [];

  function appeared(selector) {
    return $(selector).filter(function() {
      return $(this).is(':appeared');
    });
  }

  function process() {
    check_lock = false;
    for (var index = 0, selectorsLength = selectors.length; index < selectorsLength; index++) {
      var $appeared = appeared(selectors[index]);

      $appeared.trigger('appear', [$appeared]);

      if ($prior_appeared[index]) {
        var $disappeared = $prior_appeared[index].not($appeared);
        $disappeared.trigger('disappear', [$disappeared]);
      }
      $prior_appeared[index] = $appeared;
    }
  }

  function add_selector(selector) {
    selectors.push(selector);
    $prior_appeared.push();
  }

  // "appeared" custom filter
  $.expr[':'].appeared = function(element) {
    var $element = $(element);
    if (!$element.is(':visible')) {
      return false;
    }

    var window_left = $window.scrollLeft();
    var window_top = $window.scrollTop();
    var offset = $element.offset();
    var left = offset.left;
    var top = offset.top;

    if (top + $element.height() >= window_top &&
        top - ($element.data('appear-top-offset') || 0) <= window_top + $window.height() &&
        left + $element.width() >= window_left &&
        left - ($element.data('appear-left-offset') || 0) <= window_left + $window.width()) {
      return true;
    } else {
      return false;
    }
  };

  $.fn.extend({
    // watching for element's appearance in browser viewport
    appear: function(options) {
      var opts = $.extend({}, defaults, options || {});
      var selector = this.selector || this;
      if (!check_binded) {
        var on_check = function() {
          if (check_lock) {
            return;
          }
          check_lock = true;

          setTimeout(process, opts.interval);
        };

        $(window).scroll(on_check).resize(on_check);
        check_binded = true;
      }

      if (opts.force_process) {
        setTimeout(process, opts.interval);
      }
      add_selector(selector);
      return $(selector);
    }
  });

  $.extend({
    // force elements's appearance check
    force_appear: function() {
      if (check_binded) {
        process();
        return true;
      }
      return false;
    }
  });
})(function() {
  if (typeof module !== 'undefined') {
    // Node
    return require('jquery');
  } else {
    return jQuery;
  }
}());
