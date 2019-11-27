<?php

namespace App\Http\Controllers;


use App\Cliente;
use App\Funcionario;
use App\Aviso;
use App\Orcamento;
use App\Turma_Aluno;
use Illuminate\Http\Request;

class OrcamentoController extends Controller
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
        $orcamentos = Orcamento::all();
        return view('orcamento.index',compact('orcamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orcamento = new Orcamento();
        $clientes = Cliente::all();
        return view('orcamento.formulario',compact('orcamento','clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orcamento = new Orcamento();

        if($request->id){
            $orcamento =  $orcamento->find($request->id);
        }
        $orcamento->fill($request->all());
        $orcamento->save();

        return redirect('orcamento');
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
        $orcamento = Orcamento::find($id);
        $clientes = Cliente::all();
        return view('orcamento.formulario',compact('orcamento','clientes'));
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
        $orcamento = Orcamento::find($id);
        $orcamento->delete();
        return redirect('orcamento');

    }
}
