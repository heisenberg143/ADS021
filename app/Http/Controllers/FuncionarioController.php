<?php

namespace App\Http\Controllers;

use App\TipoItem;
use App\Endereco;
use App\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $funcionarios =Funcionario::all();
        return view('funcionario.index',compact('funcionarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $funcionario = New Funcionario();
        $enderecos = Endereco::all();
        return view('funcionario.formulario',compact('funcionario','enderecos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $funcionario = new Funcionario();

        //Em caso de Alteração
        if($request->id){
            $funcionario =  $funcionario->find($request->id);

        }
        $funcionario->fill($request->all());


        // Upload de arquivo
        $arquivo = $request->file('foto');

        if($arquivo && !$arquivo->getError()){
            $arquivo->store('funcionarios');
            $funcionario->foto = $arquivo->hashName();
        }
        $funcionario->save();

        return redirect('funcionario');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $funcionario = Funcionario::find($id);
        $enderecos = Endereco::all();
        return view('funcionario.formulario',compact('funcionario','enderecos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $funcionario = Funcionario::find($id);
        $funcionario->delete();
        return redirect('funcionario');
    }
    public function verificarCodigo($codigo)
    {
        $qtd = Funcionario::where('codigo',$codigo)->count();
        $mensagem = $qtd?
            "Já existe um funcionario com o código {$codigo}":
            "Não existe funcionario com o código informado";
        return[
            'existe'=>(bool)$qtd,
            'mensagem' => $mensagem,
        ];
    }
    public function verificarCpf($cpf)
    {
        $qtd = Funcionario::where('cpf',$cpf)->count();
        $mensagem = $qtd?
            "Já existe um registro com o CPF {$cpf}":
            "Não existe registro com o CPF informado";
        return[
            'existe'=>(bool)$qtd,
            'mensagem' => $mensagem,
        ];
    }
}
