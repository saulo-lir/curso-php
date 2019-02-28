<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model{

    // Como o nome da tabela está no singular, e o laravel associa o model à tabela no plural,
    // devemos nesse caso especificar o nome da tabela, caso contrário não seria necessário
    protected $table = 'lista';

    // Estamos informando que não iremos utilizar os campos created_at e updated_at que são
    // adicionados por padrão pelo laravel
    public $timestamps = false;

}
