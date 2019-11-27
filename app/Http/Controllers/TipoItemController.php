<?php

namespace App\Http\Controllers;

use App\TipoItem;
use Illuminate\Http\Request;

class TipoItemController extends Controller
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
        $tipos_itens = TipoItem::all();
        return view('tipo_item.index',compact('tipos_itens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_itens = new TipoItem();
        return view('tipo_item.formulario',compact('tipo_itens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipo_itens = new TipoItem();

        //Em caso de Alteração
        if($request->id){
            $tipo_itens =  $tipo_itens->find($request->id);

        }
        $tipo_itens->fill($request->all());


        // Upload de arquivo
        $arquivo = $request->file('foto');

        if($arquivo && !$arquivo->getError()){
            $arquivo->store('tipos_itens');
            $tipo_itens->foto = $arquivo->hashName();
        }
        $tipo_itens->save();

        return redirect('tipo_item');
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
        $tipo_itens= TipoItem::find($id);
        return view('tipo_item.formulario',compact('tipo_itens'));
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
        $tipo_itens= TipoItem::find($id);
        $tipo_itens->delete();
        return redirect('tipo_item');
    }
    public function verificarCodigo($codigo)
    {
        $qtd = TipoItem::where('codigo',$codigo)->count();
        $mensagem = $qtd?
            "Já existe um registro com o código {$codigo}":
            "Não existe registro com o código informado";
        return[
            'existe'=>(bool)$qtd,
            'mensagem' => $mensagem,
        ];
    }
}