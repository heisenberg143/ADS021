@extends('layout.app')
@section('conteudo')
    <h1>Orçamento</h1>
    <form action="/orcamento" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$orcamento->id}}">
        <div class="form-group">
                <label for="data_inicio">Data do Início</label>
                <input type="date" class="form-control" name="data_inicio" id="data_inicio" value="{{$orcamento->data_inicio}}" required>
            </div>
        <div class="form-group">
            <label for="data_fim">Data do Fim</label>
            <input type="date" class="form-control" name="data_fim" id="data_fim" value="{{$orcamento->data_fim}}" required>
        </div>
        <div class="form-group">
            <label for="observacao">Observação</label>
            <textarea class="form-control" id="observacao" name="observacao" rows="3" required>{{$orcamento->observacao}}</textarea>
        </div>
        <div class="form-group">
            <label for="cliente_id">Cliente</label>
            <select name="cliente_id" class="form-control" id="cliente_id" required>
                <option value="">Selecione</option>
                @foreach($clientes as $cliente)
                    <option {{$cliente->id == $orcamento->cliente_id ? 'selected':''}}
                            value="{{$cliente->id}}">{{$cliente->nome}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a class="btn btn-danger" href="/orcamento">Voltar</a>
    </form><br>
@endsection