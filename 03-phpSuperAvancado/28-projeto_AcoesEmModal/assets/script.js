function editar(id){	

	// Requisição do arquivo editar.php via Ajax
	$.ajax({
		url:'editar.php',
		type:'POST',
		data:{id:id},
		beforeSend:function(){
			$('#modal').find('.modal-body').html('Carregando...');

			// Abrir o modal
			$('#modal').modal('show');
		},
		success:function(html){ // Irá receber um html como resposta

			$('#modal').find('.modal-body').html(html); //Exibe o formulário criado

			// Prevenir que o formulário seja enviado e salvar os dados via ajax
			$('#modal').find('.modal-body').find('form').on('submit', salvar);

			// Abrir o modal
			$('#modal').modal('show');

			}
				
	});
}

function salvar(e){

	e.preventDefault(); // Previne o envio dos aruivos na forma padrão

	// Pegar os dados do formulário
	var nome = $(this).find('input[name=nome]').val();
	var email = $(this).find('input[name=email]').val();
	var senha = $(this).find('input[name=senha]').val();
	var id = $(this).find('input[name=id]').val();

	// Requisição Ajax para o arquivo que irá salvar os dados no banco
	$.ajax({
		url:'salvar.php',
		type:'POST',
		data:{nome:nome, email:email, senha:senha, id:id},
		success:function(){
			alert('Dados alterados com sucesso!');

			window.location.href = window.location.href; // Atualiza a página
		}

	});
}

function excluir(id){

	$('#modal').find('.modal-body').html('Tem certeza que deseja excluir?<br/><button onclick="excluirUsuario('+id+')">Sim</button><button onclick="fechar()">Não</button>');

	$('#modal').modal('show');
}

function fechar(){
	$('#modal').modal('hide');
}

function excluirUsuario(id){

$.ajax({
		url:'excluir.php',
		type:'POST',
		data:{id:id},
		success:function(){
			alert('Usuário excluído com sucesso!');

			window.location.href = window.location.href; // Atualiza a página
		}

	});

}