$('document').ready(function(){
	$('#msgErroFront').hide();
	$('#email, #senha').keypress(function(event){
		var keycode = (event.keyCode ? event.keyCode : event.which);
		if(keycode == '13'){
			logar();
		}
	});

	$('#cadNome, #cadEmail, #senha1, #senha2').keypress(function(event){
		var keycode = (event.keyCode ? event.keyCode : event.which);
		if(keycode == '13'){
			registrar();
		}
	});
	
});



function registrar(){
	var nome = $('#cadNome').val();
	var email = $('#cadEmail').val();
	var senha = $('#senha1').val(); 
	var senhaRepetida = $('#senha2').val(); 

	if(!verificarCampos(nome, email, senha, senhaRepetida)){
		return false;
	}else{

		$.ajax({
			url:"php/cad-usuario.php",
			method: "POST",
			data: {
				login: 1,
				nome:nome,
				email: email,
				senha: senha,
				senhaRepetida:senhaRepetida
			},
			success :  function(response){						
				console.log(response);
				if(response.indexOf('success') >= 0){
					window.location = 'login.php';
					console.log("deu certo carai");
					confirmacaoRegistro();
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

function logar(){
	var email = $('#email').val();
	var senha = $('#senha').val(); 

	if(email == "" || senha == ""){
		$('#msgErroFront').html('login e/ou senha vazio(s)!');
		$('#msgErroFront').show();
	}else{

		$.ajax({
			url:"php/valida.php",
			method: "POST",
			data: {
				login: 1,
				email: email,
				senha: senha
			},
			success :  function(response){						
				console.log(response);
				if(response.indexOf('success') >= 0){
					window.location = 'index.php';
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

function confirmeSair() {
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
                    <span style="font-weight: bold;">Cadastro realizado com sucesso!</span>
                </div>
                    <div class="modal-footer">
                        <a style="text-decoration: none; color: #fff;" class="btn btn-secondary" data-dismiss="modal">Fechar</a>
                    </div>
                </div>
            </div>
		</div>`
		$('body').append(modalAppend);
}

function verificarCampos(nome, email, senha, senhaRepetida){
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

function confirmacaoRegistro() {
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
                    <span style="font-weight: bold;">Deseja realmente sair do sistema ?</span>
                </div>
                    <div class="modal-footer">
						<a style="text-decoration: none;" href="php/logout.php" class="btn btn-primary">Confirmar</a>
                        <a style="text-decoration: none; color: #fff;" class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
                    </div>
                </div>
            </div>
		</div>`
		$('body').append(modalAppend);
}