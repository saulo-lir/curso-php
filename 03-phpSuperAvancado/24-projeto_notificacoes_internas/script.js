function verificarNotificacao(){	

	console.log('Verificou...');

	$.ajax({
		url:'verificar.php',
		type: 'POST',
		dataType: 'json',
		success:function(json){			
			
			if(json.qt > 0){

				$('.notificacoes').addClass('tem_notif');
				$('.notificacoes').html(json.qt);

			}else{

				$('.notificacoes').removeClass('tem_notif');
				$('.notificacoes').html('0');
			}
			
			
		}
	});

}


$(function(){
	setInterval(verificarNotificacao, 2000); // Repetir a função verificarNotificacao() a cada 2 segundos
	verificarNotificacao(); // Executa automaticamente assim que a tela for aberta (Opcional)

	//$('.nofiticacoes').on('click', function(){

	//});

	// Requisição ajax para adicionar uma nova notificação
	$('.addNotif').on('click', function(){

		$.ajax({
			url:'add.php'			
		});

	});
});