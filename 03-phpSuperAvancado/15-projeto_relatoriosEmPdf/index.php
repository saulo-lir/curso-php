<?php
// Para gerar o PDF, primeiro geramos o conteúdo html, para
// assim converte-lo em pdf

// A conversão será feita pela dependência mpdf.
// Para usá-la no projeto, executar no terminal:
// composer require mpdf/mpdf

// Acessar a documentação da dependência: https://github.com/mpdf/mpdf

ob_start(); // Salva na memória do servidor todo conteúdo impresso na tela

?>

<h1>Relatório</h1>

<table border='1' width='100%'>
  <tr>
    <th>Cliente</th>
    <th>Valor do Pedido</th>
    <th>Data de Entrega</th>
  </tr>
  <tr>
    <td>Cliente 1</td>
    <td>R$ 82,00</td>
    <td>01/01/2017</td>
  </tr>
  <tr>
    <td>Cliente 1</td>
    <td>R$ 82,00</td>
    <td>01/01/2017</td>
  </tr>
  <tr>
    <td>Cliente 1</td>
    <td>R$ 82,00</td>
    <td>01/01/2017</td>
  </tr>
</table>

<?php
  $html = ob_get_contents(); // Salva o html na variável
  ob_end_clean(); // Encerra a função ob_start() e limpa e memória

  // echo $html;

require 'vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html); // Salva o html dentro do pdf que vai ser gerado
//$mpdf->Output(); // Transforma a tela atual da página em um pdf. Após esse comando, não é recomendado
                // que digitemos mais código html abaixo dele

// Forçar o navegador a baixar o documento pdf quando ele for gerado

$arquivo = md5(time().rand(0, 9999).'.pdf');

$mpdf->Output($arquivo,'F');
          // Nome do arquivo, ação

// Parâmetros de ação:

// I = Abre o pdf no browser (Ação padrão, quando não especificamos nada essa ação é executada automaticamente)
// D = Executa o download do pdf
// F = Salva no servidor

$link = 'localhost/curso-php/03-phpSuperAvancado/15-projeto_relatoriosEmPdf/'.$arquivo;

echo 'Faça o download do seu comprovante em:<br/>'.$link;

?>
