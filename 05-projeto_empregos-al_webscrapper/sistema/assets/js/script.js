$(function(){

	/* Carregar dados */

	$.ajax({
		type:'GET',
		url:'http://localhost/empregos-al/api/vagas/listar',
		data:{},
		success:function(data){
			console.log(data);

			$('#total-vagas').html(data['total']);			

			for(i=0; i<data['total']; i++){
				$('#vaga-container').append('<div class="vaga-content"><h4 class="vaga-titulo">'+data[i]['titulo']+'</h4><hr/><h4>'+data[i]['subtitulo']+'</h4><p>'+data[i]['requisitos']+'</p><h4>'+data[i]['subtitulo2']+'</h4><p>'+data[i]['atividades']+'</p><hr/><p>'+data[i]['contato']+'</p></div>');
			}
						
		}
	});

});

/* Plugin Searchable */

$( '#vaga-container' ).searchable({
    searchField: '#search',
    selector: '.vaga-content',
    childSelector: '.vaga-titulo',
    show: function( elem ) {
        elem.slideDown(100);
    },
    hide: function( elem ) {
        elem.slideUp( 100 );
    }
})
