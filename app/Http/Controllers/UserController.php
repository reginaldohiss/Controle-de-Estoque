<?php

namespace App\Http\Controllers;

use App\Client;
use App\Product;
use App\Provider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function indexAll()
    {
        return view('admin.User', [
            'user' => Auth::user(),
            'users' => User::paginate(7)

        ]);
    }

    public function deshboard(){
        if(Auth::check() === true){
            return view('admin.layout.admin', [
                'user' => Auth::user(),
            ]);
        }
        return redirect()->route('adm.login');

    }

    public function loginForm()
    {
        return view('admin.login.loginForm');
    }

    public function loginRegister(Request $request)
    {

        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            return redirect()->back()->withInput()->withErrors(['Email Invalido']);
        }

        $credencials = [
          'email' => $request->email,
          'password' => $request->password
        ];

        if(Auth::attempt($credencials)){
            return redirect()->route('product.index');
        }else{
            return redirect()->back()->withInput()->withErrors(['Dados Inválidos']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('adm.login');
    }

    public function new()
    {
        return view('admin.login.registerForm');
    }

    public function newRes(Request $request)
    {
        $user = new User();

        $credencials = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'telephone' => $request->telephone
        ];
        if(Auth::attempt($credencials)){
            return redirect()->back()->withInput()->withErrors(['Dados Existentes']);
        }

        if(empty($request->name)){
            return redirect()->back()->withInput()->withErrors(['Name Incorreto']);
        }
        $user->name = $request->name;

        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            return redirect()->back()->withInput()->withErrors(['Email Inválido']);

        }
        $user->email = $request->email;

        if(empty($request->password)){
            return redirect()->back()->withInput()->withErrors(['Senha Inválida']);
        }
        $user->password = Hash::make($request->password);

        if(empty($request->telephone)){
            return redirect()->back()->withInput()->withErrors(['Telephone Inválida']);
        }
        $user->telephone = $request->telephone;
        $user->save();
        return redirect()->route('adm.login');
    }


    public function setting()
    {
        return view('admin.login.settingConfig',[
            'user' => Auth::user()
        ]);
    }

    public function settingSucess(Request $request)
    {
        $user = Auth::user();

        if(empty($request->name)){
            return redirect()->back()->withInput()->withErrors(['Name Incorreto']);
        }
        $user->name = $request->name;

        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            return redirect()->back()->withInput()->withErrors(['E-mail Inválido']);
        }
        $user->email = $request->email;

        if(empty($request->password)){
            return redirect()->back()->withInput()->withErrors(['Senha Inválida']);
        }

        if(empty($request->telephone)){
            return redirect()->back()->withInput()->withErrors(['Telephone Inválida']);
        }

        $user->telephone = $request->telephone;

        if (!password_verify($request->password, $user->password)){
            return redirect()->back()->withInput()->withErrors(['Senha Incorreta']);
        }

        $user->save();
        return redirect()->route('product.index');
    }
    public function delet(User $user)
    {
        $user->delete();
        return redirect()->route('adm.login');

    }

    public function search(Request $request, User $user)
    {
        $dataForm = $request->except('_token');
        $users = $user->search($dataForm);

        return view('admin.User', compact('users', 'dataForm'), [
            'user' => Auth::user()
        ]);
    }
}
