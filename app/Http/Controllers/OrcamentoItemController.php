<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\OrcamentoItem;
use App\Orcamento;
use App\TipoItem;
use Illuminate\Http\Request;

class OrcamentoItemController extends Controller
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
        $orcamentos_itens = OrcamentoItem::all();
        return view('orcamento_item.index',compact('orcamentos_itens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orcamento_item = new OrcamentoItem();
        $clientes = Cliente::all();
        $tipos_itens = TipoItem::all();
        return view('orcamento_item.formulario',compact('orcamento_item','clientes','tipos_itens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orcamento_item = new OrcamentoItem();

        if($request->id){
            $orcamento_item = $orcamento_item->find($request->id);

        }
        $orcamento_item->fill($request->all());
        $orcamento_item->save();

        return redirect('orcamento_item');
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
        $orcamento_item = OrcamentoItem::find($id);
        $clientes =  Cliente::all();
        $tipos_itens = TipoItem::all();
        return view('orcamento_item.formulario',compact('orcamento_item','clientes','tipos_itens'));
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
        $orcamento_item = OrcamentoItem::find($id);
        $orcamento_item->delete();
        return redirect('orcamento_item');
    }
}