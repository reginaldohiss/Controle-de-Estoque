<?php

namespace App\Http\Controllers;

use App\Product;
use App\Provider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        if(Auth::user()){
            return view('admin.home', [
                'user' => Auth::user(),
                'products' => Product::paginate(7)
    //            'prov' => Provider::all()
            ]);
        }
            return redirect()->route('adm.login');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        if(empty($request->nome)){
            return redirect()->back()->withInput()->withErrors(['Preencha os dados corretamente']);
        }
        $product->name = $request->nome;

        if(empty($request->unidade)){
            return redirect()->back()->withInput()->withErrors(['Preencha os dados corretamente']);

        }
        $product->unity = $request->unidade;

        if(empty($request->codigo)){
            return redirect()->back()->withInput()->withErrors(['Preencha os dados corretamente']);
        }
        $product->code = $request->codigo;

        if(empty($request->preco)){
            return redirect()->back()->withInput()->withErrors(['Preencha os dados corretamente']);
        }
        $product->price = $request->preco;

        if(empty($request->stock)){
            return redirect()->back()->withInput()->withErrors(['Preencha os dados corretamente']);
        }

        $product->stock = $request->stock;

        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.painel.produto.RestProduct', [
            'user' => Auth::user(),
            'product' => $product,
            'provider' => $product->provide()->first()
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.painel.produto.UpdateProduct', [
            'product' => $product,
            'user' => Auth::user()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if(empty($request->nome)){
            return redirect()->back()->withInput()->withErrors(['Preencha os dados corretamente']);
        }
        $product->name = $request->nome;

        if(empty($request->unidade)){
            return redirect()->back()->withInput()->withErrors(['Preencha os dados corretamente']);

        }
        $product->unity = $request->unidade;

        if(empty($request->codigo)){
            return redirect()->back()->withInput()->withErrors(['Preencha os dados corretamente']);
        }
        $product->code = $request->codigo;

        if(empty($request->preco)){
            return redirect()->back()->withInput()->withErrors(['Preencha os dados corretamente']);
        }
        $product->price = $request->preco;

        if(empty($request->stock)){
            return redirect()->back()->withInput()->withErrors(['Preencha os dados corretamente']);
        }

        $product->stock = $request->stock;
        $product->save();

        return redirect()->route('product.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }

    public function searchProduct(Request $request, Product $product)
    {
        $dataForm = $request->except('_token');
        $products = $product->search($dataForm);
        return view('admin.home', compact('products', 'dataForm'), [
            'user' => Auth::user(),
        ]);

    }
}
