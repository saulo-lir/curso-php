<!DOCTYPE html>

<!--
  Para a geração de gráficos, utilizaremos a biblioteca
  javascript Charts.js, disponível em:

  http://www.chartjs.org/
  https://github.com/chartjs/Chart.js/releases/tag/v2.7.1

  Roteiro:
  1) Criar uma tela com a tag canvas
  2) Gerar o gráfico a partir da tela criada

  Caso queiramos mudar o tipo de gráfico exibido,
  mudamos o atributo type para o tipo desejado.
  Para verificar quais tipos existem e como eles são gerados,
  entramos no site chartjs.org, depois na aba samples, selecionamos
  o gráfico desejado, e exibimos o código fonte
-->

<html>
  <head>
    <title>Projeto Gráficos</title>
  </head>

  <body>

    <div style='width:500px'>
      <canvas id='grafico'></canvas>
    </div>

    <?php
      $custos = array(8,15,37,97,35);
    ?>

    <script type='text/javascript' src='Chart.min.js'></script>
    <script type='text/javascript'>

    window.onload = function(){
      // Selecionar o canvas junto com seu contexto
      var contexto = document.getElementById('grafico').getContext('2d');

      // Iniciar a biblioteca Chart
      var grafico = new Chart(contexto, {
        type:'bar',
        data:{
          labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio'],
          datasets: [{ // Gráfico 1
            label: 'Vendas', // Ex.: Compras, Atendimentos, Histórico, etc
            backgroundColor: '#FF0000',
            borderColor: '#FF0000',
            data: [   // Dados referentes aos labels declarados acima
              3,
              6,
              7,
              4,
              15
            ],
            fill: false
          }, {  // Gráfico 2
            label: 'Custos',
            backgroundColor: '#00FF00',
            borderColor: '#00FF00',
            data: [<?= implode(',', $custos) ?>], // Exibindo dados dinâmicos com o php
            fill: false
          }]
        }
      });
    }

    </script>
  </body>

</html>
