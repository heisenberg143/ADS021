@extends('layout.app')
@section('conteudo')
    <h1>Orçamento do Item</h1>
    <form action="/orcamento_item" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$orcamento_item->id}}">
        <div class="row">
            <legend class="col-form-label col-sm-2 pt-0">Tamanho</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tamanho" id="PP" value="PP" {{ $orcamento_item->tamanho == 'PP' ? 'checked' : '' }} required>
                    <label class="form-check-label" for="PP">
                       PP
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tamanho" id="P" value="P" {{ $orcamento_item->tamanho == 'P' ? 'checked' : '' }}>
                    <label class="form-check-label" for="P">
                        P
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tamanho" id="M" value="M" {{ $orcamento_item->tamanho == 'M' ? 'checked' : '' }}>
                    <label class="form-check-label" for="M">
                        M
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tamanho" id="G" value="G" {{ $orcamento_item->tamanho == 'G' ? 'checked' : '' }}>
                    <label class="form-check-label" for="G">
                        G
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tamanho" id="GG" value="GG" {{ $orcamento_item->tamanho == 'GG' ? 'checked' : '' }}>
                    <label class="form-check-label" for="GG">
                        GG
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tamanho" id="EG" value="EG" {{ $orcamento_item->tamanho == 'EG' ? 'checked' : '' }}>
                    <label class="form-check-label" for="EG">
                        EXG
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="cor">Cor</label>
            <input type="color" class="form-control" name="cor" id="cor" value="{{$orcamento_item->cor}}" required>
        </div>
        <div class="form-group">
            <label for="detalhe">Detalhe</label>
            <input type="text" class="form-control" name="detalhe" id="detalhe" value="{{$orcamento_item->detalhe}}" required>
        </div>
        <div class="form-group">
            <label for="valor">Valor</label>
            <input type="text" class="form-control" name="valor" id="valor" value="{{$orcamento_item->valor}}" required>
        </div>
        <div class="form-group">
            <label for="cliente_id">Cliente</label>
            <select name="cliente_id" class="form-control" id="cliente_id" required>
                <option value="">Selecione</option>
                @foreach($clientes as $cliente)
                    <option {{$cliente->id == $orcamento_item->cliente_id ? 'selected':''}}
                            value="{{$cliente->id}}">{{$cliente->nome}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tipos_itens_id">Tipo de Item</label>
            <select name="tipos_itens_id" class="form-control" id="tipos_itens_id" required>
                <option value="">Selecione</option>
                @foreach($tipos_itens as $tipo_itens)
                    <option {{$tipo_itens->id == $orcamento_item->tipos_itens_id ? 'selected':''}}
                            value="{{$tipo_itens->id}}">{{$tipo_itens->produto}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <a class="btn btn-danger" href="/orcamento_item">Voltar</a>
    </form><br>
@endsection