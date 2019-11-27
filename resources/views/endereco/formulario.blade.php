@extends('layout.app')
@section('conteudo')
    <h1>Endereço</h1>
    <form action="/endereco" method="post">
        @csrf
        <input type="hidden" name="id"  value="{{$endereco->id}}">
        <div class="form-group">
            <label for="cep">CEP</label>
            <input type="text" class="form-control" name="cep" id="cep" value="{{$endereco->cep}}" required>
        </div>
        <div class="form-group">
            <label for="logradouro">Logradouro</label>
            <input type="text" class="form-control" name="logradouro" id="logradouro" value="{{$endereco->logradouro}}" required>
        </div>
        <div class="form-group">
            <label for="complemento">Complemento</label>
            <input type="text" class="form-control" name="complemento" id="complemento" value="{{$endereco->complemento}}" required>
        </div>
        <div class="form-group">
            <label for="numero">Número</label>
            <input type="text" class="form-control" name="numero" id="numero" value="{{$endereco->numero}}" required>
        </div>
        <div class="form-group">
            <label for="bairro">Bairro</label>
            <input type="text" class="form-control" name="bairro" id="bairro" value="{{$endereco->bairro}}" required>
        </div>
        <div class="form-group">
            <label for="uf">UF</label>
            <input type="text" class="form-control" name="uf" id="uf" value="{{$endereco->uf}}" required>
        </div>
        <div class="form-group">
            <label for="municipio">Município</label>
            <input type="text" class="form-control" name="municipio" id="municipio"  value="{{$endereco->municipio}}" required>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <a class="btn btn-danger" href="/endereco">Voltar</a>
    </form><br>
    <script>
        $(function () {
            $('#cep').change(function () {
                $.ajax({
                    url:'https://viacep.com.br/ws/' + $('#cep').val() + '/json/',
                    success: function (dados) {
                        $('#logradouro').val(dados.logradouro)
                        $('#complemento').val(dados.complemento)
                        $('#bairro').val(dados.bairro)
                        $('#uf').val(dados.uf)
                        $('#municipio').val(dados.localidade)
                    }
                });
            })
        });
    </script>
@endsection




