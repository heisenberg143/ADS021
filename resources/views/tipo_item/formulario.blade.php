@extends('layout.app')
@section('conteudo')
    <h1>Tipo de Item</h1>
    <form action="/tipo_item" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id"  value="{{$tipo_itens->id}}">
        <div class="form-group">
            <label for="foto">Foto</label>
            <img width="200" height="150" src="/g3/public/storage/tipos_itens/{{$tipo_itens->foto}}" alt="{{$tipo_itens->produto}}">
            <input type="file" class="form-control" name="foto">
        </div>
        <div class="form-group">
            <label for="codigo">Código</label>
            <input type="text" class="form-control" name="codigo" id="codigo" value="{{$tipo_itens->codigo}}"  required>
            <span id="mensagem-codigo" style="color:red"></span>
        </div>
        <div class="form-group">
            <label for="produto">Produto</label>
            <input type="text" class="form-control" name="produto"  id="produto" value="{{$tipo_itens->produto}}"  required>
        </div>
        <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input type="number" class="form-control" name="quantidade" id="quantidade" value="{{$tipo_itens->quantidade}}" required>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a class="btn btn-danger" href="/tipo_item">Voltar</a>
    </form><br>
    <script>
        $(function () {
            $('#codigo').change(function () {
                $.ajax({
                    url: '/tipo_item/verificar-codigo/' + $('#codigo').val(),
                    success: function (dados) {
                        if (dados.existe) {
                            $('#mensagem-codigo').html(dados.mensagem);
                            $('#codigo').val('')
                        }
                    }
                });
            })
        });
    </script>
@endsection


