<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastroRequest;
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

    public function store(CadastroRequest $request)
    {
        $request = $request->toArray();

        $request['password'] = Hash::make($request['password']);

        $user = User::create($request);

        Auth::login($user);

        return redirect()->route('dashboard');

    }

    public function login(Request $request)
    {

        if (request()->isMethod('POST')) {

            $login = $request->validate([
                'email' => 'required',
                'password' => 'required',
            ]);

            if (Auth::attempt($login)) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('login')->with('erro', 'Usuário ou senha inválidos');
            }
        }

        // Se não é post, mostra a view normalmente

        return view('login');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }

}
