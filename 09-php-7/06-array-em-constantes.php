<?php

// Salvar um array em constantes

define("CONFIG", array(
	'dbname' => 'banco',
	'dbuser' => 'root',
	'dbpass' => 'root'
));

echo CONFIG['dbname'];
echo CONFIG['dbuser'];
echo CONFIG['dbpass'];