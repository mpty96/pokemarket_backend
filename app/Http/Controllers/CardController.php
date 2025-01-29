<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    // Obtener todas las cartas
    public function index()
    {
        return Card::all(); // Obtener todas las cartas
        $cartas = Card::all();

        // Retornamos las cartas en formato JSON
        return response()->json($cartas, 200);
    }

    public function store(Request $request)
    {
        $card = Card::create($request->all());
        return response()->json($card, 201); // Crear una nueva carta
    }

    public function update(Request $request, $id)
    {
        $card = Card::findOrFail($id);
        $card->update($request->all());
        return response()->json($card);
    }

    public function destroy($id)
    {
        Card::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}

