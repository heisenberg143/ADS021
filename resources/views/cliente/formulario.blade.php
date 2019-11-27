@extends('layout.app')
@section('conteudo')
    <h1>Cliente</h1>
    <form action="/cliente" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id"  value="{{$cliente->id}}">
        <div class="form-group">
            <label for="foto">Foto</label>
            <img width="200" src="/g3/public//storage/clientes/{{$cliente->foto}}" alt="{{$cliente->nome}}" title="{{$cliente->nome}}">
            <input type="file" class="form-control" name="foto">
        </div>
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" value="{{$cliente->nome}}" required>
        </div>
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" name="telefone" id="telefone" value="{{$cliente->telefone}}" required>
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" name="email" id="email" value="{{$cliente->email}}" required>
            <span id="mensagem-email" style="color:red"></span>
        </div>
        <div class="form-group">
            <label for="data_nascimento">Data de Nascimento</label>
            <input type="date" class="form-control" name="data_nascimento" id="data_nascimento" value="{{$cliente->data_nascimento}}" required>
        </div>
        <div class="form-group">
            <label for="endereco_id">CEP</label>
            <select name="endereco_id" class="form-control" id="endereco_id" required>
                <option value="">Selecione</option>
                @foreach($enderecos as $endereco)
                    <option {{$endereco->id == $cliente->endereco_id ? 'selected':''}}
                            value="{{$endereco->id}}">{{$endereco->cep}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <a class="btn btn-danger" href="/cliente">Voltar</a>
    </form><br>
    <h1>Orçamentos</h1>
    <table class="table table-dark table-hover table-bordered table-striped">
        <tr>
            <th>Id</th>
            <th>Data do Início</th>
            <th>Data do Fim</th>
            <th>Observação</th>
            <th>Cliente</th>
        </tr>
        @foreach($cliente->orcamentos as $orcamento)
            <tr>
                <td>{{$orcamento->id}}</td>
                <td>{{ date( 'd/m/Y' , strtotime($orcamento->data_inicio))}}</td>
                <td>{{ date( 'd/m/Y' , strtotime($orcamento->data_fim))}}</td>
                <td>{{$orcamento->observacao}}</td>
                <td>{{$orcamento->cliente->nome}}</td>
            </tr>
        @endforeach
    </table><br>
    <h1>Orçamentos dos Itens</h1>
    <table class="table table-dark table-hover table-bordered table-striped">
        <tr>
            <th>Id</th>
            <th>Tamanho</th>
            <th>Cor</th>
            <th>Detalhe</th>
            <th>Valor</th>
            <th>Cliente</th>
            <th>Tipo de Item</th>
        </tr>
        @foreach($cliente->orcamentos_itens as $orcamento_item)
            <tr>
                <td>{{$orcamento_item->id}}</td>
                <td>{{$orcamento_item->tamanho}}</td>
                <td>{{$orcamento_item->cor}}</td>
                <td>{{$orcamento_item->detalhe}}</td>
                <td>{{$orcamento_item->valor}}</td>
                <td>{{$orcamento_item->cliente->nome}}</td>
                <td>{{$orcamento_item->tipos_itens_id}}</td>
            </tr>
        @endforeach
    </table><br>
    <script>
        $(function () {
            $('#email').change(function () {
                $.ajax({
                    url: '/cliente/verificar-email/' + $('#email').val(),
                    success: function (dados) {
                        if (dados.existe) {
                            $('#mensagem-email').html(dados.mensagem);
                            $('#email').val('')
                        }
                    }
                });
            })
        });
    </script>
@endsection


