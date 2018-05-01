
function pegarAulas(obj){

	var item = obj.value; // Salva o item selecionado	

	$.ajax({
		url:BASE_URL+'home/pegar_aulas',
		type:'POST',
		data:{modulo:item},
		//dataType:'json', // O retorno da requisição será um json
		success:function(json){
			console.log(json);

			var html = '';

			for(var i in json){
				html += '<option value="'+json[i].id+'">'+json[i].titulo+'</option>';
			}

			$('#aulas').html(html);
		}
	});


}