@extends('layout.app')
@section('conteudo')
    <h1>Funcionários</h1>
    <a href="funcionario/create" class="btn btn-warning">Novo</a>
    <table class="table table-light table-bordered table-striped">
        <tr>
            <th>Id</th>
            <th>Foto</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>E-mail</th>
            <th>Data de Nascimento</th>
            <th>CPF</th>
            <th>CEP</th>
            <th>Ações</th>
        </tr>
        @foreach($funcionarios as $funcionario)
            <tr>
                <td>{{$funcionario->id}}</td>
                <td>@if($funcionario->foto) <img width="100" src="/storage/funcionarios/{{$funcionario->foto}}" alt="{{$funcionario->nome}}" title="{{$funcionario->nome}}">
                    @endif
                </td>
                <td>{{$funcionario->nome}}</td>
                <td>{{$funcionario->telefone}}</td>
                <td>{{$funcionario->email}}</td>
                <td>{{ date( 'd/m/Y' , strtotime($funcionario->data_nascimento))}}</td>
                <td>{{$funcionario->cpf}}</td>
                <td>{{$funcionario->endereco->cep}}</td>
                <td>
                    <a class="btn btn-primary" href="funcionario/{{$funcionario->id}}/edit">Alterar</a><br><br>
                    <a class="btn btn-danger" href="funcionario/{{$funcionario->id}}/destroy">Excluir</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
