<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    //------------------- Registro de usuario -----------------//
    public function register(Request $request)
    {
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
    ]);

    $user = User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => bcrypt($validatedData['password']),
    ]);

    return response()->json([
        'message' => 'Usuario registrado correctamente',
        'user' => $user,
    ], 200);
    }


    //--------------- Inicio de sesión ------------------//
    public function login(Request $request)
    {
        // Validar los datos enviados
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Buscar al usuario por email
        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            // Iniciar sesión manualmente
            Auth::login($user);

            return response()->json([
                'message' => 'Inicio de sesión exitoso',
                'user' => $user,
            ], 200);
        }

        // Credenciales incorrectas
        return response()->json(['message' => 'Credenciales incorrectas'], 401);
    }

    //----------------- Cierre de sesión ---------------------//
    public function logout(Request $request)
    {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return response()->json(['message' => 'Cierre de sesión exitoso'], 200);
    }

}