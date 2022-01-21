<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use Illuminate\Support\Facades\Route;

Route::get('/admin', 'UserController@deshboard')->name('adm');
Route::get('/', 'UserController@loginForm')->name('adm.login');
Route::get('/admin/login/logout', 'UserController@logout')->name('adm.logout');
Route::post('/admin/login/register', 'UserController@loginRegister')->name('adm.register');
Route::get('/admin/login/new', 'UserController@new')->name('adm.new');
Route::post('/admin/login/newRes', 'UserController@newRes')->name('adm.newRes');
Route::get('/admin/painel/setting', 'UserController@setting')->name('adm.setting');
Route::post('/admin/painel/settingSucess', 'UserController@settingSucess')->name('adm.settingSucess');
Route::get('/admin/painel/delet/{user}', 'UserController@delet')->name('adm.delet');

Route::get('/painel/userAll', 'UserController@indexAll')->name('painel.userAll');
Route::any('/search', 'UserController@search')->name('painel.search');
Route::any('/product/search', 'ProductController@searchProduct')->name('painel.searchProduct');


Route::resource('painel', 'ProductController')->names('product')->parameters(['painel' => 'product']);

Route::any('/fornecedor/search', 'ProviderController@searchProvider')->name('fornecedor.searchProvider');
Route::resource('adm/fornecedor', 'ProviderController')->names('provider')->parameters(['fornecedor' => 'provider']);

Route::resource('compra', 'PurchaseController')->names('purchase')->parameters(['compra' => 'purchase']);

Route::any('/cliente/search', 'ClientController@searchClient')->name('clienter.searchProvider');
Route::resource('cliente', 'ClientController')->names('client')->parameters(['cliente' => 'client']);


//-----------------------------------------------
Route::get('pdf/produto', 'PdfController@pdfProduct')->name('pdf.produto');
Route::get('pdf/usuario', 'PdfController@pdfUsuario')->name('pdf.usuario');
Route::get('pdf/cliente', 'PdfController@pdfCliente')->name('pdf.cliente');
Route::get('pdf/fornecedor', 'PdfController@pdfFornecedor')->name('pdf.fornecedor');
Route::get('pdf/compra', 'PdfController@pdfPurchase')->name('pdf.compra');

