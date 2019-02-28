<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

// Usando a biblioteca para tratamento de formulários
use Illuminate\Http\Request;

// Usando o model que criamos
use App\Lista;

class HomeController extends Controller{

    public function index(){
        // echo "Testando 123";

        $array = [
            'nome' => 'Gandalf',
            'idade' => 1000
        ];

        // Pegando o conteúdo da tabela lista
        $lista = Lista::all();

        // Usando WHERE: $lista = Lista::where('id', '10')->get();
        // Deltetando itens: $lista = Lista::where('id', '<' '10')->limit(3)->delete();

        $array['lista'] = $lista;

        return view('home', $array);
    }

    public function add(Request $request){
        if($request->has('item')){
            $item = $request->input('item');

            // Inserido novos itens na tabela
            $lista = new Lista;
            $lista->item = $item;
            $lista->save();

            /* Atualizando os itens na tabela
            $lista = Lista::find(5);
            $lista->item = 'Novo item';
            $lista->save();
            */

        }
            return redirect('/home');
    }

    // Deletando um item
    public function del($id){
        Lista::find($id)->delete();

        return redirect('/home');
    }

    public function teste($id){
        echo "O parâmetro foi: ".$id;
    }

}
