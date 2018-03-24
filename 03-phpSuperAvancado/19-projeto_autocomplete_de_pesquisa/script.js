$(function(){

	$('#busca').on('keyup', function(){
		var texto = $(this),val();

		$.ajax({
			url:'busca.php',
			type:'POST',
			dataType: 'json',
			data:{texto:texto},
			success:function(data){
				console.log(data);

				var html = '';

				for(var i in json){
					html += '<li>'+json[i].nome+'</li>';
				}


				$('#resultado').html(html);
			}
		});
	});

});