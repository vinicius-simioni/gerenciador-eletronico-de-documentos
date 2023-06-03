<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('cadastro');
    }

    public function store(Request $request)
    {
        $request = $request->toArray();

        $request['password'] = Hash::make($request['password']);

        $user = User::create($request);
    }

    public function login(Request $request)
    {
        // Post == gravando
        if (request()->isMethod('POST')) {
            /* Esse é o tipo de validação "inline"
                    É diferente da validação que fizemos
                    criando um Request específico
                    como o EstoqueRequest */
            $login = $request->validate([
                'name' => 'required',
                'password' => 'required',
            ]);

            if (Auth::attempt($login)) {
                return redirect()->route('estoque');
            } else {
                return redirect()->route('user.login')->with('erro', 'Usuário ou senha inválidos');
            }
        }

        // Se não é post, mostra a view normalmente
        return view('login');
    }

}
