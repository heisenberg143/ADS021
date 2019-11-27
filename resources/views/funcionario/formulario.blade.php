@extends('layout.app')
@section('conteudo')
    <h1>Funcionário</h1>
    <form action="/funcionario" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id"  value="{{$funcionario->id}}">
        <div class="form-group">
            <label for="foto">Foto</label>
            <img width="200" src="/storage/funcionarios/{{$funcionario->foto}}" alt="{{$funcionario->nome}}" title="{{$funcionario->nome}}">
            <input type="file" class="form-control" name="foto">
        </div>
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" value="{{$funcionario->nome}}" required>
        </div>
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" name="telefone" id="telefone" value="{{$funcionario->telefone}}" required>
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" name="email" id="email" value="{{$funcionario->email}}" required>
        </div>
        <div class="form-group">
            <label for="data_nascimento">Data de Nascimento</label>
            <input type="date" class="form-control" name="data_nascimento" id="data_nascimento" value="{{$funcionario->data_nascimento}}" required>
        </div>
        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" name="cpf" id="cpf" value="{{$funcionario->cpf}}" required>
            <span id="mensagem-cpf" style="color: red"></span>
        </div>
        <div class="form-group">
            <label for="endereco_id">CEP</label>
            <select name="endereco_id" class="form-control" id="endereco_id" required>
                <option value="">Selecione</option>
                @foreach($enderecos as $endereco)
                    <option {{$endereco->id == $funcionario->endereco_id ? 'selected':''}}
                            value="{{$endereco->id}}">{{$endereco->cep}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <a class="btn btn-danger" href="/funcionario">Voltar</a>
    </form><br>
    <script>
        $(function () {
            $('#cpf').change(function () {
                $.ajax({
                    url: '/funcionario/verificar-cpf/' + $('#cpf').val(),
                    success: function (dados) {
                        if (dados.existe) {
                            $('#mensagem-cpf').html(dados.mensagem);
                            $('#cpf').val('')
                        }
                    }
                });
            })
        });
    </script>
@endsection




