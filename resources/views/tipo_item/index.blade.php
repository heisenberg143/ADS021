@extends('layout.app')
@section('conteudo')
    <h1>Tipos de Itens</h1>
    <a href="tipo_item/create" class="btn btn-warning">Novo</a>
    <table class="table table-light table-hover table-bordered table-striped">
        <tr>
            <th>Id</th>
            <th>Foto</th>
            <th>Código</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Ações</th>
        </tr>
        @foreach($tipos_itens as $tipo_itens)
            <tr>
                <td>{{$tipo_itens->id}}</td>
                <td>@if($tipo_itens->foto) <img width="100" height="100" src="/storage/tipos_itens/{{$tipo_itens->foto}}" alt="{{$tipo_itens->produto}}" title="{{$tipo_itens->produto}}">
                    @endif
                </td>
                <td>{{$tipo_itens->codigo}}</td>
                <td>{{$tipo_itens->produto}}</td>
                <td>{{$tipo_itens->quantidade}}</td>
                <td>
                    <a class="btn btn-primary" href="tipo_item/{{$tipo_itens->id}}/edit">Alterar</a>
                    <a class="btn btn-danger" href="tipo_item/{{$tipo_itens->id}}/destroy">Excluir</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection


