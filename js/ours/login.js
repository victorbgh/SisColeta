$('document').ready(function(){

	$("#btn-login").click(function(){
		var data = $("#login-form").serialize();
			
		$.ajax({
			type : 'POST',
			url  : '../../php/login.php',
			data : data,
			dataType: 'json',
			beforeSend: function()
			{
				$("#btn-login").html('Validando ...');
			},
			success :  function(response){						
				if(response.codigo == "1"){	
					$("#btn-login").html('Entrar');
					$("#login-alert").css('display', 'none')
					window.location.href = "index.php";
				}
				else{			
					$("#btn-login").html('LOGIN');
					$("#login-alert").css('display', 'block')
					$("#mensagem").html('<strong>Erro! </strong>' + response.mensagem);
				}
		    }
		});
	});

});

/* NOTE: USAR MODAL */
function confirmeSair() {
    if (confirm('Deseja realmente sair do sistema?')) {
        window.location.href = "logout.php";
    } else {
        return false;
    }
}