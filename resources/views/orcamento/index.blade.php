@extends('layout.app')
@section('conteudo')
    <h1>Orçamentos</h1>
    <a href="orcamento/create" class="btn btn-warning">Novo</a>
    <table class="table table-light table-hover table-bordered table-striped">
        <tr>
            <th>Id</th>
            <th>Data do Início</th>
            <th>Data do Fim</th>
            <th>Observação</th>
            <th>Cliente</th>
            <th>Ações</th>
        </tr>
        @foreach($orcamentos as $orcamento)
            <tr>
                <td>{{$orcamento->id}}</td>
                <td>{{ date( 'd/m/Y' , strtotime($orcamento->data_inicio))}}</td>
                <td>{{ date( 'd/m/Y' , strtotime($orcamento->data_fim))}}</td>
                <td>{{$orcamento->observacao}}</td>
                <td>{{$orcamento->cliente->nome}}</td>
                <td>
                    <a class="btn btn-primary" href="orcamento/{{$orcamento->id}}/edit">Alterar</a>
                    <a class="btn btn-danger" href="orcamento/{{$orcamento->id}}/destroy">Excluir</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection


