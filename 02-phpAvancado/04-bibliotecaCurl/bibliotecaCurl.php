<?php

// Biblioteca CURL tem a função de fazer requisições para sites 
// Usa-se para fazer integração do sistema criado com webservices e sistemas externos

$ch = curl_init(); // Inicia a biblioteca

curl_setopt($ch, CURLOPT_URL,'http://www.checkitout.com.br/wb/pingpong'); // Indica qual url será utilizada
curl_setopt($ch, CURLOPT_POST, 1); // Indica que é uma requisição do tipo POST
curl_setopt($ch, CURLOPT_POSTFIELDS, 'nome=Morgoth&idade=1000&sexo=masculino'); // Indica quais campos serão enviados na reuisição

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Indica que irá receber a resposta do servidor requisitado

$resposta = curl_exec($ch); // Copia a respota da requisição para uma variável
curl_close($ch); // Fecha a conexão

print_r($resposta);


?>