@extends('layout.app')
@section('conteudo')
    <h1>Orçamentos dos Itens</h1>
    <a href="orcamento_item/create" class="btn btn-warning">Novo</a>
    <table class="table table-light table-hover table-bordered table-striped">
        <tr>
            <th>Id</th>
            <th>Tamanho</th>
            <th>Cor</th>
            <th>Detalhe</th>
            <th>Valor</th>
            <th>Cliente</th>
            <th>Tipo de Item</th>
            <th>Ações</th>
        </tr>
        @foreach($orcamentos_itens as $orcamento_item)
            <tr>
                <td>{{$orcamento_item->id}}</td>
                <td>{{$orcamento_item->tamanho}}</td>
                <td>{{$orcamento_item->cor}}</td>
                <td>{{$orcamento_item->detalhe}}</td>
                <td>{{$orcamento_item->valor}}</td>
                <td>{{$orcamento_item->cliente->nome}}</td>
                <td>{{$orcamento_item->tipos_itens_id}}</td>
                <td>
                    <a class="btn btn-primary" href="orcamento_item/{{$orcamento_item->id}}/edit">Alterar</a>
                    <a class="btn btn-danger" href="orcamento_item/{{$orcamento_item->id}}/destroy">Excluir</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection


