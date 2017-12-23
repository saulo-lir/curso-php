<?php

    class Anuncios extends model{

        public function getTotalAnuncios($filtros){

             $filtroString = array('1=1'); // 1=1 evita que ocorra erro de sintaxe SQL após o WHERE,
                                          // caso o array $filtroString não seja preenchido com os novos valores.
                                          // Dessa forma, caso $filtroString não seja preenchido, a consulta irá ficar WHERE 1=1, não gerando erro

            if(!empty($filtros['categoria'])){
                $filtroString[] = 'anuncios.id_categoria = :id_categoria';
            }

            if(!empty($filtros['preco'])){
                $filtroString[] = 'anuncios.valor BETWEEN :preco1 AND :preco2';
            }

            if($filtros['estado'] !=''){
                $filtroString[] = 'anuncios.estado = :estado';
            }

            $sql = "SELECT COUNT(*) as c FROM anuncios WHERE ".implode(' AND ', $filtroString)." ";
            $sql = $this->db->prepare($sql);


            if(!empty($filtros['categoria'])){
                $sql->bindValue(':id_categoria', $filtros['categoria']);
            }

            if(!empty($filtros['preco'])){
                $preco = explode('-', $filtros['preco']);
                $sql->bindValue(':preco1', $preco[0]);
                $sql->bindValue(':preco2', $preco[1]);
            }

            if($filtros['estado'] !=''){
                $sql->bindValue(':estado', $filtros['estado']);
            }

            $sql->execute();

            $row = $sql->fetch();

            return $row['c'];

        }

        public function getUltimosAnuncios($pagina, $itemPorPagina, $filtros){

            // Criando a paginação
            $offset = ($pagina - 1) * $itemPorPagina;

            $array = array();

            // Criando os filtros de pesquisa
            $filtroString = array('1=1'); // 1=1 evita que ocorra erro de sintaxe SQL após o WHERE,
                                          // caso o array $filtroString não seja preenchido com os novos valores.
                                          // Dessa forma, caso $filtroString não seja preenchido, a consulta irá ficar WHERE 1=1, não gerando erro

            if(!empty($filtros['categoria'])){
                $filtroString[] = 'anuncios.id_categoria = :id_categoria';
            }

            if(!empty($filtros['preco'])){
                $filtroString[] = 'anuncios.valor BETWEEN :preco1 AND :preco2';
            }

            if($filtros['estado'] !=''){
                $filtroString[] = 'anuncios.estado = :estado';
            }

            $sql = "SELECT *, (select anuncios_imagens.url from anuncios_imagens
            where anuncios_imagens.id_anuncio = anuncios.id limit 1) as url,
            (select categorias.nome from categorias
            where categorias.id = anuncios.id_categoria) as categoria
            FROM anuncios WHERE ".implode(' AND ', $filtroString)." ORDER BY id DESC LIMIT $offset, 2";

            $sql = $this->db->prepare($sql);

            if(!empty($filtros['categoria'])){
                $sql->bindValue(':id_categoria', $filtros['categoria']);
            }

            if(!empty($filtros['preco'])){
                $preco = explode('-', $filtros['preco']);
                $sql->bindValue(':preco1', $preco[0]);
                $sql->bindValue(':preco2', $preco[1]);
            }

            if($filtros['estado'] !=''){
                $sql->bindValue(':estado', $filtros['estado']);
            }


            $sql->execute();

            if($sql->rowCount() > 0){
                $array = $sql->fetchAll();
            }

            return $array;
        }

        public function getMeusAnuncios($id){
            $array = array();

            $sql = "SELECT *, (select anuncios_imagens.url from anuncios_imagens
            where anuncios_imagens.id_anuncio = anuncios.id limit 1) as url
            FROM anuncios WHERE id_usuario = :id_usuario";
            // Seleciona todos os campos da tabela anuncios, junto com as urls das imagens
            // contidas na tabela anuncios_imagens, limitando a uma imagem

            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id_usuario',$id);
            $sql->execute();

            if($sql->rowCount() > 0){
                $array = $sql->fetchAll();
            }

            return $array;
        }

        public function getAnuncio($id){
            $array= array();

            $sql = "SELECT *,
            (select categorias.nome from categorias where categorias.id = anuncios.id_categoria) as categoria,
            (select usuarios.telefone from usuarios where usuarios.id = anuncios.id_usuario) as telefone
            FROM anuncios WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id',$id);
            $sql->execute();

            if($sql->rowCount() > 0){
                $array = $sql->fetch();
                $array['fotos'] = array();

                // Selecionar as imagens do anúncio
                $sql = "SELECT id, url FROM anuncios_imagens WHERE id_anuncio = :id_anuncio";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(':id_anuncio', $id);
                $sql->execute();

                if($sql->rowCount() > 0){
                    $array['fotos'] = $sql->fetchAll();
                }
            }

            return $array;
        }

        public function addAnuncio($titulo, $categoria, $valor, $descricao, $estado){

            $sql = "INSERT INTO anuncios SET id_usuario = :id_usuario, id_categoria = :id_categoria,
            titulo = :titulo, descricao = :descricao, valor = :valor, estado = :estado";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id_usuario', $_SESSION['cLogin']);
            $sql->bindValue(':id_categoria', $categoria);
            $sql->bindValue(':titulo', $titulo);
            $sql->bindValue(':descricao', $descricao);
            $sql->bindValue(':valor', $valor);
            $sql->bindValue(':estado', $estado);
            $sql->execute();
        }

        public function editAnuncio($titulo, $categoria, $valor, $descricao, $estado, $fotos, $id){

            // Atualizar as informações do anúncio
            $sql = "UPDATE anuncios SET id_usuario = :id_usuario, id_categoria = :id_categoria,
            titulo = :titulo, descricao = :descricao, valor = :valor, estado = :estado WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id_usuario', $_SESSION['cLogin']);
            $sql->bindValue(':id_categoria', $categoria);
            $sql->bindValue(':titulo', $titulo);
            $sql->bindValue(':descricao', $descricao);
            $sql->bindValue(':valor', $valor);
            $sql->bindValue(':estado', $estado);
            $sql->bindValue(':id', $id);
            $sql->execute();

            // Atualizar as fotos do anúncio
            if(count($fotos) > 0){
                for($i=0;$i<count($fotos['tmp_name']);$i++){
                    $tipo = $fotos['type'][$i];

                    if(in_array($tipo, array('image/jpeg', 'image/png'))){ // Verifica se o tipo da foto é jpeg ou png
                        $novoNome = md5(time().rand(0, 9999)).'.jpg'; // Cria o novo nome da foto
                        move_uploaded_file($fotos['tmp_name'][$i], 'assets/images/anuncios/'.$novoNome); // Salva a foto na pasta designada

                        // Redimensionar a foto e salvar na pasta local
                        list($width_orig, $height_orig) = getimagesize('assets/images/anuncios/'.$novoNome);
                        $ratio = $width_orig / $height_orig;

                        $width = 500; // Largura máxima que a foto irá ter em px
                        $height = 500; // Altura máxima que a foto irá ter em px

                        if($width / $height > $ratio){
                            $width = $height * $ratio;
                        }else {
                            $height = $width / $ratio;
                        }

                        $img = imagecreatetruecolor($width, $height);

                        if($tipo == 'image/jpeg'){
                            $origi = imagecreatefromjpeg('assets/images/anuncios/'.$novoNome);
                        } elseif($tipo == 'image/png'){
                            $origi = imagecreatefrompng('assets/images/anuncios/'.$novoNome);
                        }

                        imagecopyresampled($img, $origi, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

                        imagejpeg($img, 'assets/images/anuncios/'.$novoNome, 80); // Salva a imagem final no formato jpeg

                        // Salvar o nome da foto no banco de dados
                        $sql = "INSERT INTO anuncios_imagens set id_anuncio = :id_anuncio, url = :url";
                        $sql = $this->db->prepare($sql);
                        $sql->bindValue(':id_anuncio', $id);
                        $sql->bindValue(':url', $novoNome);
                        $sql->execute();

                    }
                }
            }
        }


        public function removerAnuncio($id){

            //Remover as imagens do anúncio
            $sql = "DELETE FROM anuncios_imagens WHERE id_anuncio = :id_anuncio";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id_anuncio', $id);
            $sql->execute();

            //Remover o anúncio
            $sql = "DELETE FROM anuncios WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();
        }

        public function removerFoto($id){
            $id_anuncio = 0;

            $sql = "SELECT id_anuncio FROM anuncios_imagens WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();

            if($sql->rowCount() > 0){
                $row = $sql->fetch();
                $id_anuncio = $row['id_anuncio'];
            }

            $sql = "DELETE FROM anuncios_imagens WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();

            return $id_anuncio;
        }

    }

?>
