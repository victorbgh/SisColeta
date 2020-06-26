$(document).ready(function(){
	$('#msgErroFront').hide();
	$('#nomeColeta, #endereco, #cep, #lat, #lng').keypress(function(event){
		var keycode = (event.keyCode ? event.keyCode : event.which);
		if(keycode == '13'){
			registrarPonto();
		}
	});

	$("#cep").mask("99999-999");
	$("#telColeta").mask("(99) 99999-9999");
});



function registrarPonto(){
	var nome = $('#nomeColeta').val();
	var endereco = $('#endereco').val();
    var cep = $('#cep').val();
    var tipo = $('#tipoLixo').val(); 
    var lat = $('#lat').val(); 
	var lng = $('#lng').val();
	var cidade = $("#cidadeColeta").val();
	var telefone = $("#telColeta").val();

	if(!verificarCamposColeta(nome, endereco, cep, tipo, lat, lng, cidade, telefone)){
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
				cep: cep,
				cidade: cidade,
				telefone: telefone
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

function verificarCamposColeta(nome, endereco, cep, tipo, lat, lng, telefone, cidade){
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
	}else if(telefone == "" || telefone == null){
		$('#msgErroFront').html('Informe um telefone!');
		$('#msgErroFront').show();
	}else if(cidade == "" || cidade == null){
		$('#msgErroFront').html('Informe a cidade!');
		$('#msgErroFront').show();
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
                        <a style="text-decoration: none; color: #fff;" class="btn btn-primary" onclick="redirecionarMapa()" >Fechar</a>
                    </div>
                </div>
            </div>
		</div>`
		$('body').append(modalAppend);
		$("#exampleModalLong").modal();
}

function redirecionarMapa(){
	window.location = 'maps.php';
}

function limparCampos(){
	$('#nomeColeta').val('');
	$('#endereco').val('');
	$('#cep').val('');
	$('#cidadeColeta').val('');
	$('#telColeta').val('');
	$('#tipoLixo').val('valor1');
	$('#lat').val('');
	$('#lng').val('');
}

function editarLocal(id){
	$.ajax({
		url:"php/buscar-editar-ponto.php",
		method: "POST",
		data: { id: id },
		success :  function(response){						
			if(response.indexOf('empty') == -1){
				localStorage.removeItem('lat');
				localStorage.removeItem('lng');
				localStorage.setItem('lat', response[0].lat);
				localStorage.setItem('lng', response[0].lng);
				localStorage.setItem('data', JSON.stringify(response));
				window.location = 'edit-coleta.php';
			}else{
				$('#msgErroFront').html(response);
				$('#msgErroFront').show();
			}
		},
		error: function(response){
			$('#msgErroFront').html("Erro interno no servidor");
			$('#msgErroFront').show();				
		},
		dataType:"json"
	});
}

function editarMarcador(){
	var id = data[0].id;
	var nome = $('#nomeColeta').val();
	var endereco = $('#endereco').val();
    var cep = $('#cep').val();
    var tipo = $('#tipoLixo').val(); 
    var lat = $('#lat').val(); 
	var lng = $('#lng').val();
	var cidade = $("#cidadeColeta").val();
	var telefone = $("#telColeta").val();

	if(!verificarCamposColeta(nome, endereco, cep, tipo, lat, lng, cidade, telefone)){
		return false;
	}else{
		
		cep = $("#cep").val().replace('-', '');

		$.ajax({
			url:"php/editar-marcador.php",
			method: "POST",
			data: {
				id: id,
                coleta: 1,
                nome: nome,
				endereco:endereco,
				tipo: tipo,
                lat:lat,
                lng:lng,
				cep: cep,
				cidade: cidade,
				telefone: telefone
			},
			success :  function(response){						
				if(response.indexOf('success') >= 0){
					console.log("deu certo carai");
					confirmacaoEdicaoColeta();
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

function confirmacaoEdicaoColeta() {
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
                    <span style="font-weight: bold;">Edição de ponto de coleta realizado com sucesso</span>
                </div>
                    <div class="modal-footer">
                        <a style="text-decoration: none; color: #fff;" class="btn btn-primary" onclick="redirecionar()" >Fechar</a>
                    </div>
                </div>
            </div>
		</div>`
		$('body').append(modalAppend);
		$("#exampleModalLong").modal();
}

function redirecionar(){
	window.location = 'locais.php';
}

function ExcluirMarcador(id){
	$.ajax({
		url:"php/excluir-marcador.php",
		method: "POST",
		data: { id: id },
		success :  function(response){						
			if(response.statusCode == 200){
				location.reload();
			}else{
				$('#msgErroFront').html(response);
				$('#msgErroFront').show();
			}
		},
		error: function(response){
			$('#msgErroFront').html("Erro interno no servidor");
			$('#msgErroFront').show();				
		},
		dataType:"json"
	});
}

function confirmacaoExclusaoColeta(id) {
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
                    <span style="font-weight: bold;">Deseja excluir o ponto de coleta?</span>
				</div>
					<div class="modal-footer">
                        <a style="text-decoration: none; color: #fff;" class="btn btn-danger" onclick="ExcluirMarcador(${id})" > Confirmar </a>
                        <a style="text-decoration: none; color: #fff;" class="btn btn-primary" data-dismiss="modal">Fechar</a>
                    </div>
                </div>
            </div>
		</div>`
		$('body').append(modalAppend);
		$("#exampleModalLong").modal();
}