<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.client', [
            'user' => Auth::user(),
            'client' => Client::paginate(7),
//            'cliennt' => Client::all()
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

        $pessoa = new Client();

        if(empty($request->cliente)){
            return redirect()->back()->withInput()->withErrors(['Preencha os dados corretamente']);
        }
        $pessoa->client = $request->cliente;

        if(empty($request->cpf)){
            return redirect()->back()->withInput()->withErrors(['Preencha os dados corretamente']);

        }
        $pessoa->CPF = $request->cpf;

        if(empty($request->identidade)){
            return redirect()->back()->withInput()->withErrors(['Preencha os dados corretamente']);
        }
        $pessoa->Identity = $request->identidade;

        $pessoa->save();

        return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('admin.painel.cliente.RestClient', [
            'user' => Auth::user(),
            'cliente' => $client
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('admin.painel.cliente.UpdateClient', [
            'user' => Auth::user(),
            'clien' => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        if(empty($request->cliente)){
            return redirect()->back()->withInput()->withErrors(['Preencha os dados corretamente']);

        }
        $client->client = $request->cliente;

        if(empty($request->cpf)){
            return redirect()->back()->withInput()->withErrors(['Preencha os dados corretamente']);
        }
        $client->CPF = $request->cpf;

        if(empty($request->identidade)){
            return redirect()->back()->withInput()->withErrors(['Preencha os dados corretamente']);
        }
        $client->Identity = $request->identidade;
        $client->save();

        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('client.index');
    }

    public function searchClient(Request $request, Client $cliente)
    {
        $dataForm = $request->except('_token');
        $client = $cliente->search($dataForm);
        return view('admin.client', compact('client', 'dataForm'), [
            'user' => Auth::user(),
        ]);

    }
}
