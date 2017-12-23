
--- Tabela usuarios ----

create table usuarios(

id int unsigned AUTO_INCREMENT not null primary key,
email varchar(50),
senha varchar(32),
permissoes text  --- Esse campo conterá palavras chave que serão ---
                 --- usadas para identificar se o usuário tem permissão ---
                 --- ou não de realizar determinada tarefa no sistema ---
                 --- Ex.: ADD,EDIT,DEL,SECRET 

)



insert into usuarios set email = 'goku@dbz.com.br', senha = md5('teste'), permissoes = 'ADD,EDIT,DEL,SECRET'


--- Tabelas documentos ---

create table documetos(

id int unsigned AUTO_INCREMENT not null primary key,
titulo varchar(100)

)
