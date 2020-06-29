<?php

namespace App\Http\Controllers;

use App\Product;
use App\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.Provider', [
            'user' => Auth::user(),
            'provid' => Provider::paginate(7),
            'provide' => Product::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $fornecedor = new Provider();

        if(empty($request->fornecedor)){
            return redirect()->back()->withInput()->withErrors(['Preencha os dados corretamente']);
        }
        $fornecedor->provider = $request->fornecedor;

        if(empty($request->empresa)){
            return redirect()->back()->withInput()->withErrors(['Preencha os dados corretamente']);

        }
        $fornecedor->company = $request->empresa;

        if(empty($request->cnpj)){
            return redirect()->back()->withInput()->withErrors(['Preencha os dados corretamente']);
        }
        $fornecedor->cnpj = $request->cnpj;

        if(empty($request->stock)){
            return redirect()->back()->withInput()->withErrors(['Preencha os dados corretamente']);
        }
        $indice = $request->stock;
        $partInice = substr($indice, 0, 1);

        $laco = Provider::all();
        if($laco->count() >= 1){
            foreach ($laco as $la){
                if($la->stock == $partInice){
                    return redirect()->back()->withInput()->withErrors(['Este Produto já Possuí Empresa']);
                }
                $fornecedor->stock = $partInice;
            }
        }else{
            $fornecedor->stock = $partInice;
        }

        $fornecedor->save();

        return redirect()->route('provider.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        return view('admin.painel.fornecedor.RestProvider', [
            'user' => Auth::user(),
            'provid' => $provider,
            'provider' => $provider->produc()->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {
        return view('admin.painel.fornecedor.UpdateProvider', [
            'provide' => $provider,
            'user' => Auth::user(),
            'provider' => $provider->produc()->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provider $provider)
    {
        if(empty($request->fornecedor)){
            return redirect()->back()->withInput()->withErrors(['Preencha os dados corretamente']);

        }
        $provider->provider = $request->fornecedor;

        if(empty($request->empresa)){
            return redirect()->back()->withInput()->withErrors(['Preencha os dados corretamente']);
        }
        $provider->company = $request->empresa;

        if(empty($request->cnpj)){
            return redirect()->back()->withInput()->withErrors(['Preencha os dados corretamente']);
        }
        $provider->CNPJ = $request->cnpj;


        if(empty($request->stock)){
            return redirect()->back()->withInput()->withErrors(['Preencha os dados corretamente']);
        }elseif ($request->stock == $provider->provider){
            return redirect()->back()->withInput()->withErrors(['Preencha os dados corretamente']);
        }
        $provider->stock = $request->stock;
        $provider->save();

        return redirect()->route('provider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();
        return redirect()->route('provider.index');
    }

    public function searchProvider(Request $request, Provider $provider)
    {
        $dataForm = $request->except('_token');
        $provid = $provider->search($dataForm);
        return view('admin.Provider', compact('provid', 'dataForm'), [
            'user' => Auth::user(),
        ]);

    }

//    public function retorno(Provider $provider)
//    {
//        return  $provider->produc()->first();
//    }
}
