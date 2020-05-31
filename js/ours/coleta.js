$(document).ready(function(){
	$('#msgErroFront').hide();
	$('#nomeColeta, #endereco, #cep, #lat, #lng').keypress(function(event){
		var keycode = (event.keyCode ? event.keyCode : event.which);
		if(keycode == '13'){
			registrarPonto();
		}
	});

	$("#cep").mask("99999-999");
});



function registrarPonto(){
	var nome = $('#nomeColeta').val();
	var endereco = $('#endereco').val();
    var cep = $('#cep').val();
    var tipo = $('#tipoLixo').val(); 
    var lat = $('#lat').val(); 
	var lng = $('#lng').val();

	if(!verificarCamposColeta(nome, endereco, cep, tipo, lat, lng)){
		return false;
	}else{
		
		cep = $("#cep").val().replace('-', '');

		$.ajax({
			url:"php/cad-marcador.php",
			method: "POST",
			data: {
                coleta: 1,
                nome: nome,
				endereco:endereco,
				tipo: tipo,
                lat:lat,
                lng:lng,
				cep: cep
			},
			success :  function(response){						
				if(response.indexOf('success') >= 0){
					console.log("deu certo carai");
					confirmacaoCadastroColeta();
					limparCampos()
				}else{
					$('#msgErroFront').html("Erro interno no servidor");
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

function verificarCamposColeta(nome, endereco, cep, tipo, lat, lng){
	if(nome == "" || nome == null){
		$('#msgErroFront').html('Campo nome vazio!');
		$('#msgErroFront').show();
		return false;
	}else if(endereco == "" || endereco == null){
		$('#msgErroFront').html('Campo endereço vazio!');
		$('#msgErroFront').show();
		return false;
	}else if(cep == "" || cep == null){
		$('#msgErroFront').html('Informa o cep!');
		$('#msgErroFront').show();
		return false;
	}else if(tipo == "" || tipo == null){
		$('#msgErroFront').html('Informa o tipo de coleta!');
		$('#msgErroFront').show();
		return false;
	}else if(lat == "" || lat == null){
		$('#msgErroFront').html('Informe a latitude do local!');
		$('#msgErroFront').show();
		return false;
	}else if(!isLatitude(lat)){
		$('#msgErroFront').html('Informe a latitude válida!');
		$('#msgErroFront').show();
		return false;
	}else if(lng == "" || lng == null){
		$('#msgErroFront').html('Informe a longitude do local!');
		$('#msgErroFront').show();
		return false;
	}else if(!isLongitude(lng)){
		$('#msgErroFront').html('Informe a longitude válida!');
		$('#msgErroFront').show();
		return false;
	}
	return true;
}

function isLatitude(lat) {
	return isFinite(lat) && Math.abs(lat) <= 90;
  }
  
  function isLongitude(lng) {
	return isFinite(lng) && Math.abs(lng) <= 180;
  }

function confirmacaoCadastroColeta() {
	let modalAppend = `<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Confirmação</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span style="font-weight: bold;">Cadastro de ponto de coleta realizado com sucesso</span>
                </div>
                    <div class="modal-footer">
                        <a style="text-decoration: none; color: #fff;" class="btn btn-primary" data-dismiss="modal" >Fechar</a>
                    </div>
                </div>
            </div>
		</div>`
		$('body').append(modalAppend);
		$("#exampleModalLong").modal();
}

//mudar
function limparCampos(){
	$('#nomeColeta').val('');
	$('#endereco').val('');
	$('#cep').val('');
	$('#tipoLixo').val('valor1');
	$('#lat').val('');
	$('#lng').val('');
}