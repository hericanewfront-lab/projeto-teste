<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
public function store(Request $request)
    {
        // 1. Validação dos dados que vêm do formulário
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        // 2. Criar o usuário passando a senha normal (o Model faz o hash sozinho)
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, // Sem Hash::make(), o cast 'hashed' cuida disso
        ]);

        // 3. Logar o usuário e redirecionar
        Auth::login($user);

        return redirect('/ideas');
    }
}
