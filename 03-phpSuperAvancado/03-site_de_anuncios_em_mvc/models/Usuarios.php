<?php

    class Usuarios extends model{

        public function getTotalUsuarios(){
            
            $sql = "SELECT COUNT(*) as c FROM usuarios";
            $sql = $this->db->query($sql);
            $row = $sql->fetch();

            return $row['c'];
        }

        public function cadastrar($nome, $email, $senha, $telefone){

            $sql = "SELECT id FROM usuarios WHERE email = :email";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':email', $email);
            $sql->execute();

            if($sql->rowCount() == 0){
                $sql = "INSERT INTO usuarios set nome = :nome, email = :email,
                senha = :senha, telefone = :telefone";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(':nome', $nome);
                $sql->bindValue(':email', $email);
                $sql->bindValue(':senha', md5($senha));
                $sql->bindValue(':telefone', $telefone);
                $sql->execute();

                return true;

            }else{
                return false;
            }
        }

        public function login($email, $senha){

            $sql = "SELECT id FROM usuarios WHERE email = :email AND senha = :senha";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':senha', md5($senha));
            $sql->execute();

            if($sql->rowCount() > 0){
                $dado = $sql->fetch();
                $_SESSION['cLogin'] = $dado['id'];

                return true;
            }else{
                return false;
            }

        }

    }
?>
