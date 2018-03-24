$(function(){

	$('button').on('click', function(){
		
		$.ajax({
			url:'<?= BASE_URL ?>/ajax',
			type:'POST',
			data:{nome:'Saulo'},
			success:function(){
				$('.borda').html(r);
			}
		});

	});	

});

