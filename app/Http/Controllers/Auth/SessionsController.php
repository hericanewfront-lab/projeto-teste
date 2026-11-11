<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{

    public function create()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    // Certifique-se de importar o Auth no topo

    public function store(Request $request)
    {
        // 1. Validar apenas se os campos foram preenchidos
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Tentar autenticar o usuário
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/ideas');
        }

        // 3. Se falhar, retornar com erro
        return back()->withErrors([
            'email' => 'As credenciais fornecidas não coincidem com os nossos registros.',
        ])->onlyInput('email');
    }  //redirect
    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        Auth::logout();
        return redirect('/ideas');
    }
}
