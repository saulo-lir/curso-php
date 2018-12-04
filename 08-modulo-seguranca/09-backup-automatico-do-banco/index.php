<?php

/*

Rodar o dump do banco através do PHP

exec() = Executa comandos no terminal

OBS.: Caso não esteja configurado no computador para poder rodar o comando
mysqldump diretamente, então é necessário informar o caminho inteiro do arquivo
mysqldump. No Windows por exemplo, ficaria assim: C://wamp/bin/mysql/mysql5.5.8/bin/mysqldump


*/
				// Se não tiver senha, não digita o -p
exec("mysqldump -u root -psenha nome_do_banco > bd_backup.sql");


/*

Esse script pode ser agendado para ser executado de tempos em tempos, de acordo com sua necessidade


PERGUNTA: É possível utilizar o mysqldump para salvar todos os bancos de dados de uma única vez? Como seria o comando?

RESPOSTA: É possível sim. você vai utilizar algo como:

mysqldump -u [usuario] -p[senha]--single-transaction --quick --all-databases | gzip > backup.sql.gz

*/