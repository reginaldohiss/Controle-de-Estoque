<?php

namespace App\Http\Controllers;

use App\Client;
use App\Product;
use App\Provider;
use App\Purchase;
use App\User;
use Barryvdh\DomPDF\Facade;
use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function pdfProduct()
    {
        $produt = Product::all();

        $pdfProduct = Facade::loadView('admin.Pdf.PdfProduct', compact('produt'));

        return $pdfProduct->setPaper('a4')->stream('Produtos.pdf');
    }

    public function pdfUsuario()
    {
        $usuario = User::all();

        $pdfuser = Facade::loadView('admin.Pdf.PdfUser', compact('usuario'));

        return $pdfuser->setPaper('a4')->stream('Usuários.pdf');
    }

    public function pdfCliente()
    {
        $cliente = Client::all();

        $pdfclient = Facade::loadView('admin.Pdf.PdfClient', compact('cliente'));

        return $pdfclient->setPaper('a4')->stream('Clientes.pdf');
    }

    public function pdfFornecedor()
    {
        $fornecedor = Provider::all();

        $pdffornece = Facade::loadView('admin.Pdf.PdfProvider', compact('fornecedor'));

        return $pdffornece->setPaper('a4')->stream('fornecedores.pdf');
    }

    public function pdfPurchase(Request $request)
    {
        $compra = Purchase::find((int) $request->clientee);
        $pdffornece = Facade::loadView('admin.Pdf.PdfPurchase', compact('compra'));

        return $pdffornece->setPaper('a4')->stream('Compra.pdf');
    }
}
