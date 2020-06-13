var data;
(function($) {
    
	$(window).on('load', function() {
		var preloaderFadeOutTime = 500;
		function hidePreloader() {
			var preloader = $('.spinner-wrapper');
			setTimeout(function() {
				preloader.fadeOut(preloaderFadeOutTime);
			}, 500);
		}
		hidePreloader();
	});

    $(window).on('scroll load', function() {
		if ($(".navbar").offset().top > 20) {
			$(".fixed-top").addClass("top-nav-collapse");
		} else {
			$(".fixed-top").removeClass("top-nav-collapse");
		}
    });

	$(function() {
		$(document).on('click', 'a.page-scroll', function(event) {
			var $anchor = $(this);
			$('html, body').stop().animate({
				scrollTop: $($anchor.attr('href')).offset().top
			}, 150, 'easeInOutExpo');
			event.preventDefault();
		});
	});

    $(".navbar-nav li a").on("click", function(event) {
    if (!$(this).parent().hasClass('dropdown'))
        $(".navbar-collapse").collapse('hide');
    });;
    

	var a = 0;
	$(window).scroll(function() {
		if ($('#counter').length) {
			var oTop = $('#counter').offset().top - window.innerHeight;
			if (a == 0 && $(window).scrollTop() > oTop) {
			$('.counter-value').each(function() {
				var $this = $(this),
				countTo = $this.attr('data-count');
				$({
				countNum: $this.text()
				}).animate({
					countNum: countTo
				},
				{
					duration: 2000,
					easing: 'swing',
					step: function() {
					$this.text(Math.floor(this.countNum));
					},
					complete: function() {
					$this.text(this.countNum);
					//alert('finished');
					}
				});
			});
			a = 1;
			}
		}
    });


    

    $('body').prepend('<a href="body" class="back-to-top page-scroll">Voltar para o topo</a>');
    var amountScrolled = 0;
    $(window).scroll(function() {
        if ($(window).scrollTop() > amountScrolled) {
            $('a.back-to-top').fadeIn('500');
        } else {
            $('a.back-to-top').fadeOut('500');
        }
    });


	$(".button, a, button").mouseup(function() {
		$(this).blur();
	});

})(jQuery);

function toggleIcon(e) {
    $(e.target)
        .prev('.panel-heading')
        .find(".more-less")
        .toggleClass('fas fa-plus fas fa-minus');
}



$(document).ready(function(){
	var isadm = localStorage.getItem('admin');
	if(isadm == 1){
		$("#cadColeta").show();
	}else{
		$("#cadColeta").hide();
	}
	
    $('.message a').click(function(){
        $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
     });

    var hash = window.location.href;
     
    if($(window).scrollTop() === 0) {
		$('nav').addClass('topo');		
    }else{
        $('nav').removeClass('topo');
    }

    if (window.location.hash.indexOf('openCollapse') != -1) {
        var urlCollapse = window.location.hash.split('#');
        var urlSplit = urlCollapse[2].split('?');

        $('html, body').animate({
            scrollTop: $(`#${urlCollapse[1]}`).offset().top - 150
        }, 600);

        $(`#${urlSplit[0]}`).collapse('toggle');

    }

    if(window.location.hash) {
        history.replaceState(null, null, ' ');
      }

    if(window.location.href.indexOf('conta.php') > 0){
        data = JSON.parse(localStorage.getItem('data'));
        $('#nomeUsuario').val(data[0].nome);
        $('#emailUsuario').val(data[0].email);
        $('#senhaUsuario').val(window.atob(data[0].senha));
	}

	if(window.location.href.indexOf('edit-coleta.php') > 0){
        data = JSON.parse(localStorage.getItem('data'));
        $('#nomeColeta').val(data[0].nome);
        $('#endereco').val(data[0].endereco);
		$('#cidadeColeta').val(data[0].cidade);
		$('#cep').val(data[0].cep);
		$('#telColeta').val(data[0].telefone);
		$('#tipoLixo').val(data[0].tipo);
		$('#lat').val(data[0].lat);
		$('#lng').val(data[0].lng);

		var latLocal = parseFloat(data[0].lat);
		var lngLocal = parseFloat(data[0].lat);

		// var myLatLng = {lat: -25.363, lng: 131.044};
		// var local = {lat:}

		// var map = new google.maps.Map(document.getElementById('cadMap'), {
		//   zoom: 4,
		//   center: myLatLng
		// });

		// var marker = new google.maps.Marker({
		//   position: myLatLng,
		//   map: map,
		//   title: 'Hello World!'
		// });

	}
	
});

$(document).scroll(function() {
    var hash = window.location.href;
     
    if($(window).scrollTop() === 0) {
        $('nav').addClass('topo');
    }else{
        $('nav').removeClass('topo');
    }
 });

 function MascaraCep(cep){
    if(mascaraInteiro(cep)==false){
        event.returnValue = false;
    }       
    return formataCampo(cep, '00000-000', event);
}

function formataCampo(campo, Mascara, evento) { 
    var boleanoMascara; 

    var Digitato = evento.keyCode;
    exp = /\-|\.|\/|\(|\)| /g
    campoSoNumeros = campo.toString().replace( exp, "" ); 

    var posicaoCampo = 0;    
    var NovoValorCampo="";
    var TamanhoMascara = campoSoNumeros.length;; 

    if (Digitato != 8) { // backspace 
            for(i=0; i<= TamanhoMascara; i++) { 
                    boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")
                                                            || (Mascara.charAt(i) == "/")) 
                    boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(") 
                                                            || (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " ")) 
                    if (boleanoMascara) { 
                            NovoValorCampo += Mascara.charAt(i); 
                              TamanhoMascara++;
                    }else { 
                            NovoValorCampo += campoSoNumeros.charAt(posicaoCampo); 
                            posicaoCampo++; 
                      }              
              }      
            campo.value = NovoValorCampo;
            return NovoValorCampo; 
    }else { 
            return true; 
    }
}

//valida numero inteiro com mascara
function mascaraInteiro(){
    if (event.keyCode < 48 || event.keyCode > 57){
            event.returnValue = false;
            return false;
    }
    return true;
}

function atualizarLogin(){
    var id = data[0].id;
    var nome = $('#nomeUsuario').val();
	var email = $('#emailUsuario').val();
	var senha = $('#senhaUsuario').val(); 
	var senhaRepetida = $('#senhaUsuarioRepetida').val(); 

	if(!verificarCamposAtualizacao(nome, email, senha, senhaRepetida)){
		return false;
	}else{

		$.ajax({
			url:"php/editar-usuario.php",
			method: "POST",
			data: {
                login: 1,
                id: id,
				nome:nome,
				email: email,
				senha: senha,
				senhaRepetida:senhaRepetida
			},
			success :  function(response){						
				if(response.indexOf('success') >= 0){
					confirmacaoAtualizarRegistro();
				}else{
					$('#msgErroFront').html(response);
					$('#msgErroFront').show();
				}
			},
			error: function(response){
				$('#msgErroFront').html("Erro interno no servidor");
				$('#msgErroFront').show();				
			},
			dataType: 'text'
		})
	}

	return false;
}

function verificarCamposAtualizacao(nome, email, senha, senhaRepetida){
	if(nome == "" || nome == null){
		$('#msgErroFront').html('Campo nome vazio!');
		$('#msgErroFront').show();
		return false;
	}else if(email == "" || email == null){
		$('#msgErroFront').html('Campo e-mail vazio!');
		$('#msgErroFront').show();
		return false;
	}else if(senha == "" || senha == null){
		$('#msgErroFront').html('Informa a senha!');
		$('#msgErroFront').show();
		return false;
	}else if(senhaRepetida == "" || senhaRepetida == null){
		$('#msgErroFront').html('Repita a senha!');
		$('#msgErroFront').show();
		return false;
	}else if(senha != senhaRepetida){
		$('#msgErroFront').html('As senhas devem ser identicas!');
		$('#msgErroFront').show();
		return false;
	}
	return true;
}

function resetUpdate(){
    window.location = 'index.php';
}