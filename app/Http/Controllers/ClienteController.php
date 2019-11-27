<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Endereco;
use Illuminate\Http\Request;

class ClienteController extends Controller
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
        $clientes = Cliente::all();
        return view('cliente.index',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cliente = new Cliente();
        $enderecos = Endereco::all();
        return view('cliente.formulario',compact('cliente','enderecos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $cliente = new Cliente();

        //Em caso de Alteração
        if($request->id){
            $cliente =  $cliente->find($request->id);

        }
        $cliente->fill($request->all());


        // Upload de arquivo
        $arquivo = $request->file('foto');

        if($arquivo && !$arquivo->getError()){
            $arquivo->store('clientes');
            $cliente->foto = $arquivo->hashName();
        }
        $cliente->save();

        return redirect('cliente');
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
        $cliente = Cliente::find($id);
        $enderecos = Endereco::all();
        return view('cliente.formulario',compact('cliente','enderecos'));
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
        $cliente = Cliente::find($id);
        $cliente->delete();
        return redirect('cliente');
    }
    public function verificarEmail($email)
    {
        $qtd = Cliente::where('email',$email)->count();
        $mensagem = $qtd?
            "Já existe um registro com o e-mail {$email}":
            "Não existe registro com o e-mail informado";
        return[
            'existe'=>(bool)$qtd,
            'mensagem' => $mensagem,
        ];
    }
}
