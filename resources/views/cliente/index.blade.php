@extends('layout.app')
@section('conteudo')
    <h1>Clientes</h1>
    <a href="cliente/create" class="btn btn-warning">Novo</a>
    <table class="table table-light table-bordered table-striped">
        <tr>
            <th>Id</th>
            <th>Foto</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>E-mail</th>
            <th>Data de Nascimento</th>
            <th>CEP</th>
            <th>Ações</th>
        </tr>
        @foreach($clientes as $cliente)
            <tr>
                <td>{{$cliente->id}}</td>
                <td>@if($cliente->foto) <img width="100" src="/storage/clientes/{{$cliente->foto}}" alt="{{$cliente->nome}}" title="{{$cliente->nome}}">
                    @endif
                </td>
                <td>{{$cliente->nome}}</td>
                <td>{{$cliente->telefone}}</td>
                <td>{{$cliente->email}}</td>
                <td>{{ date( 'd/m/Y' , strtotime($cliente->data_nascimento))}}</td>
                <td>{{$cliente->endereco->cep}}</td>
                <td>
                    <a class="btn btn-primary" href="cliente/{{$cliente->id}}/edit">Alterar</a><br><br>
                    <a class="btn btn-danger" href="cliente/{{$cliente->id}}/destroy">Excluir</a>
                </td>
            </tr>
    @endforeach
    </table>
@endsection


