<?php

    class Categoria extends model{

        public function getLista(){
            $array = array();

            $sql = "SELECT * FROM categorias";
            $sql = $this->db->query($sql);

            if($sql->rowCount() > 0){
                $array = $sql->fetchAll();
            }

            return $array;
        }
    }

?>
