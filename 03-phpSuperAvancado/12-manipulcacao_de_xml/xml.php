<?php
// 1) Carregar o arquivo xml

$xml = simplexml_load_file('nfe.xml');
// Caso estivéssemos carregando o xml através de uma url
// a função usada seria simplexml_load_string()

// print_r($xml);

echo '### Dados Emissor ### <br/><br/>';

                  // Acessa segundo a hierarquia do xml
echo 'CNPJ: '.$xml->infNFe->emit->CNPJ.'<br/><br/>';
echo 'Nome: '.$xml->infNFe->emit->xNome.'<br/><br/>';

echo '### Dados Destinatário ### <br/><br/>';

                  // Acessa segundo a hierarquia do xml
echo 'CNPJ: '.$xml->infNFe->dest->CNPJ.'<br/><br/>';
echo 'Nome: '.$xml->infNFe->dest->xNome.'<br/><br/>';

// 2) Criando um xml a partir de array

// Função para criar o xml

function array_to_xml($data, &$xml_data){
              //Nosso array, Objeto do tipo SimpleXMLElement.
              // O & faz com que toda alteração feita na variável
              // dentro da função surta efeito na mesma variável fora
              // da função, sem precisar usar o return

  foreach($data as $key=>$value){
    if(is_array($value)){ // Se for um array, siginifica que existe mais itens dentro dele
      if(is_numeric($key)){
        $key = 'item'.$key; // Ex.: $key = item1
      }
      $subnode = $xml_data->addChild($key); // addChild() = adiciona uma nova tag xml no array
      array_to_xml($value, $subnode);
    }else {
      if(is_numeric($key)){
        $key = 'item'.$key;
      }
      $xml_data->addChild($key, htmlspecialchars($value)); // htmlspecialchars() = retira os caracteres especiais
                                                           // para deixar melhor formatado os valores
    }
  }
}

$data = array(
  'nome'=>'Gandalf',
  'idade'=>1000,
  'frase'=>'You Shal Not Pass!',
  'caracteristicas'=>array(
    'Mago',
    'Poderoso',
    'Velho'
  )
);

$xml_data = new SimpleXMLElement('<data/>'); // Criando um xml vazio.
                                            // Poderia ser qualquer nome na tag <data/>
          //Nosso array, objeto xml vazio
array_to_xml($data, $xml_data);

$result = $xml_data->asXML(); // asXML() = Transforma as informações xml que estão como tipo objeto
                              // para xml puro

echo $result;

/* Será impresso

<?xml version="1.0"?>
  <data>
    <nome>Gandalf</nome>
    <idade>1000</idade>
    <frase>You Shal Not Pass!</frase>
    <caracteristicas>
      <item0>Mago</item0>
      <item1>Poderoso</item1>
      <item2>Velho</item2>
    </caracteristicas>
  </data>
*/

?>
