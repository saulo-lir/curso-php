<?php

class Language{
    
    private $language;
    private $ini;
    private $bd;
    
    public function __construct(){
        $this->language = 'en'; // Define a linguagem padrão
        
        if(!empty($_SESSION['lang']) && file_exists('lang/'.$_SESSION['lang'].'.ini')){ // Verifica se existe uma sessão com a
                                                                                     //linguagem padrão e se existe os arquivos de dicionário .ini
            $this->language = $_SESSION['lang'];            
        }
        
        $this->ini = parse_ini_file('lang/'.$this->language.'.ini'); // Função que carrega arquivos .ini tranformando num array
        
        // Capturar o dicionário do banco de dados
        
        global $pdo;
        $sql = "SELECT * FROM lang WHERE lang = :lang";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(':lang',$this->language);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            foreach($sql->fetchAll() as $item){
                $this->bd[$item['nome']] = $item['valor']; // Cria o array $bd com o seu índice e valor
            }
        }
    }
    
    
    public function getLanguage(){
        return $this->language;
    }
    
    public function getTradutor($word, $return = false){
        $text = $word;
        
        if(isset($this->ini[$word])){ // Se existe uma linguagem que foi setada manualmente no arquivo ini, substitua na variável $text
            $text = $this->ini[$word];
        }
        elseif(isset($this->bd[$word])){ // Verifica se a linguagem selecionada manualmente é a mesma do banco de dados
            $text = $this->bd[$word];
        }
        
        if($return){ //Se retorno for verdadeiro
            return $text;
        }else{
            echo $text;
        }
    }
}


?>