<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Obtener el perfil del usuario autenticado.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function perfil()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        if ($user) {
            return response()->json([
                'message' => 'Perfil del usuario',
                'user' => $user,
            ], 200);
        }

        return response()->json(['message' => 'No autorizado'], 401);
    }
}
