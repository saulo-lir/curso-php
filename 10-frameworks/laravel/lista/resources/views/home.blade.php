<h2>Lista de tarefas</h2>

<!--
    Para usar os dados declarados no controller,
    usamos as chaves, que é o padrão do template
    engine blade
-->
Nome: {{ $nome }}, idade: {{$idade}}

@if(count($lista) > 0)
<ul>
    @foreach($lista as $item)
        <li>{{ $item->item }} - <a href="delete/{{$item->id}}">[x]</a></li>
    @endforeach
</ul>
@else
    <h4>Não há itens...</h4>
@endif

<hr/>

<form method="POST">
    {{ csrf_field() }} <!-- Adiciona um token de segurança (Obrigatório no Laravel) -->
    <input type="text" name="item" />
    <input type="submit" value="+" />
</form>
