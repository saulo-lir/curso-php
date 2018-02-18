$(function(){

	$('#form').on('submit', function(e){
		e.preventDefault();

		var email = $('input[name=email]').val(); // Seleciona o valor do input email
		var senha = $('input[name=senha]').val(); // Seleciona o valor do input senha

		// Limpa os campos do formulário após o envio
		$('#form').each(function(){
          this.reset();
       	}); 

		$.ajax({
			type:'POST',
			url:'login.php',
			data:{email:email, senha:senha},
			success:function(msg){
				alert(msg);
			 // window.location.href = "pagina.php";
			}
		});
	});
});