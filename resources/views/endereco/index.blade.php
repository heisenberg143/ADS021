@extends('layout.app')
@section('conteudo')
    <h1>Endereços</h1>
    <a href="endereco/create" class="btn btn-warning">Novo</a>
    <table class="table table-light table-hover table-bordered table-striped">
        <tr>
            <th>Id</th>
            <th>CEP</th>
            <th>Logradouro</th>
            <th>Complemento</th>
            <th>Número</th>
            <th>Bairro</th>
            <th>UF</th>
            <th>Município</th>
            <th>Ações</th>
        </tr>
        @foreach($enderecos as $endereco)
            <tr>
                <td>{{$endereco->id}}</td>
                <td>{{$endereco->cep}}</td>
                <td>{{$endereco->logradouro}}</td>
                <td>{{$endereco->complemento}}</td>
                <td>{{$endereco->numero}}</td>
                <td>{{$endereco->bairro}}</td>
                <td>{{$endereco->uf}}</td>
                <td>{{$endereco->municipio}}</td>
                <td>
                    <a class="btn btn-primary" href="endereco/{{$endereco->id}}/edit">Alterar</a>
                    <a class="btn btn-danger" href="endereco/{{$endereco->id}}/destroy">Excluir</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

