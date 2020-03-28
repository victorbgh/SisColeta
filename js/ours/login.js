$('document').ready(function(){

	$('#email, #senha').keypress(function(event){
		var keycode = (event.keyCode ? event.keyCode : event.which);
		if(keycode == '13'){
			logar();
		}
	});
	
});

function logar(){
	var email = $('#email').val();
	var senha = $('#senha').val(); 

	if(email == "" || senha == ""){
		console.log('errado');
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
				}
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
