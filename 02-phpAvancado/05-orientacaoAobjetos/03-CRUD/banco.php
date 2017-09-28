<?php

class Banco{
    private $pdo;
    private $numRows;
    private $array;
    
    public function __construct($host, $dbname, $dbuser, $dbpass){
        
        try{
            $this->pdo = new PDO('mysql:dbname='.$dbname.';host='.$host,$dbuser,$dbpass);
      //    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        }catch(PDOException $ex){
            echo 'Erro: '.$ex->getMessage();
        }
        
    }
    
    // Metodo para selecionar
    public function query($sql){
        $query = $this->pdo->query($sql);
        $this->numRows = $query->rowCount(); // Armazena o número de linhas encontradas
        $this->array = $query->fetchAll(); // Cria uma array e armazena todos os registros encontrados
    }
    
    public function result(){
        return $this->array;
    }
    
    public function numRows(){
        return $this->numRows;
    }
    
    // Método para inserir
    public function insert($table, $data){ // Nome da tabela, array que conterá os nomes dos campos da tabela
        if(!empty($table) && (is_array($data) && count($data) > 0)){ // Se a tabela não está vazia e o parâmetro $data for um array e não estiver vazio
         
           $sql = "INSERT INTO ".$table." SET ";
           
            $dados = array();
            
            foreach($data as $chave => $valor){
                $dados[] = $chave." = '".addslashes($valor)."'"; // Nome do campo = Nome do valor
            }
            
            $sql .= implode(', ',$dados); // Concatena a string de $sql com a função implode que irá juntar um vírgula com a string de $dados
         // $sql = $sql.implode();
         
         //echo $sql; Caso queira verificar na tela se a string tá certa
            
        //  var_dump($sql); Mostra o conteúdo da variável, incluindo seu tipo (A diferença entre o print_r é que este não mostra o tipo da variável)
        //  die();
         
          $this->pdo->query($sql);
        }   
    }
    
    public function update($table, $data, $where = array(), $where_cond = 'AND'){ // Caso o usuário não especifique a condição $where e seu complemento (AND, OR), por padrão será usado as atribuições já definidas

        if(!empty($table) && (is_array($data) && count($data) > 0) && is_array($where)){
            $sql = "UPDATE ".$table." SET ";
            $dados = array();
            
            foreach($data as $chave => $valor){
                $dados[] = $chave." = '".addslashes($valor)."'";
            }
            
            $sql .= implode(', ',$dados);
            
            if(count($where) > 0){
                $dados = array();
            
                foreach($where as $chave => $valor){ // Mudou a variável $data pela $where
                    $dados[] = $chave." = '".addslashes($valor)."'";
                }
            
                $sql .= " WHERE ".implode(" ".$where_cond." ",$dados);
            }
            
            // echo $sql;

            $this->pdo->query($sql);
        }     
    }
    
    public function delete($table, $where, $where_cond = 'AND'){
        if(!empty($table) && (is_array($where) && count($where) > 0)){
            $sql = "DELETE FROM ".$table;
            
             if(count($where) > 0){
                $dados = array();
            
                foreach($where as $chave => $valor){ // Mudou a variável $data pela $where
                    $dados[] = $chave." = '".addslashes($valor)."'";
                }
            
                $sql .= " WHERE ".implode(" ".$where_cond." ",$dados);
            }
            
            //echo $sql;
            
            $this->pdo->query($sql);
        }
    }
    
}


/* OUTRA FORMA DE USAR O MÉTODO INSERIR
 * 
    public function insert($table, $data){ 
        if(!empty($table) && (is_array($data) && count($data) > 0)){
        $sql = "INSERT INTO ".$table." (nome,idade,senha) VALUES (";
            $dados = array();
            
            foreach($data as $valor){
                $dados[] = "'".addslashes($valor)."'"; 
            }
            
            $sql .= implode(', ',$dados); 
         // $sql = $sql.implode();
         
            $sql .=');';                 
         
         $this->pdo->query($sql);
        }
    }
*/


?>
