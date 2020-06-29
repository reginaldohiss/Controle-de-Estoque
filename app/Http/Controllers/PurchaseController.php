<?php

namespace App\Http\Controllers;

use App\Client;
use App\Product;
use App\Purchase;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nm_atual = Auth::user();
        return view('admin.purchase', [
            'user' => Auth::user(),
            'usuari' => $nm_atual,
            'cliente' => Client::all(),
            'produto' => Product::all()
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
        $ind = $request->produto;
        $partprodutoo = substr($ind, 0, 1);
        $indi = $request->preco;
        $partprecoo = substr($indi, 0, 1);

        if($partprodutoo != $partprecoo){
            return redirect()->back()->withInput()->withErrors(['Selecione o Número do Produto e do Preço Iguais']);
        }

        $clientee = new Purchase();

        if(empty($request->cliente)){
            return redirect()->back()->withInput()->withErrors(['Preencha os dados corretamente']);
        }
        $indice = $request->cliente;
        $partInice = substr($indice, 4, 30);
        $clientee->client = $partInice;

        if(empty($request->produto)){
            return redirect()->back()->withInput()->withErrors(['Preencha os dados corretamente']);
        }
        $indic = $request->produto;
        $partPro = substr($indic, 4, 30);
        $clientee->product = $partPro;

        $n = Auth::user();
        $clientee->user = $n->name;
//        ----------------------------
        $indic = $request->preco;
        $partPrice = substr($indic, 6, 30);

        $clientee->price = $partPrice;

        $clientee->save();

        return redirect()->route('pdf.compra', compact('clientee'));
    }

}
