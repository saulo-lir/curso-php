
-- TABELA usuarios --

create table usuarios(
    id int unsigned not null AUTO_INCREMENT primary key,
    nome varchar(100) not null,
    email varchar(100) not null,
    senha varchar(32) not null,
    telefone varchar(30)    
)


-- TABELA categorias --

create table categorias(
    id int unsigned not null AUTO_INCREMENT PRIMARY KEY,
    nome varchar(100) not null
)


-- TABELA anuncios --

create table anuncios(
    id int unsigned not null AUTO_INCREMENT primary key,
    id_usuario int not null,    
    id_categoria int not null,
    titulo varchar(100),
    descricao text,    
    valor float,
    estado int    
)


-- TABELA anuncios_imagens --

create table anuncios_imagens(
    id int unsigned not null auto_increment primary key,
    id_anuncio int,
    url varchar(100)
)









