$(function(){
  // Bloquear o envio do formulário
  $('#form').on('submit', function(e){
    e.preventDefault();

    // Transformar a seleção do form para uma seleção DOM
    var form = document.getElementById('form');
    // var form = $('#form')[0];

    var data = new FormData(form); // Pega todos os dados do formulário

    // Estabelecer requisição ajax
    $.ajax({
      type:'POST',
      url:'recebedor.php',
      data:data,
      contentType: false,
      processData: false,
      success:function(msg){
        alert(msg);
      }
    });
  });

  /* Outra alternativa: criar o formulário caso ele não exista

  $('button').on('click', function(e){

      var data = new FormData();

      var arquivo = $('#foto')[0].files;

      if(arquivo.length > 0){

        data.append('nome', $('#nome').val());

        data.append('foto', arquivos[0]);

        $.ajax({
          type:'POST',
          url:'recebedor.php',
          data:data,
          contentType: false,
          processData: false,
          success:function(msg){
            alert(msg);
          }
      });
      }

  });

  */

});
