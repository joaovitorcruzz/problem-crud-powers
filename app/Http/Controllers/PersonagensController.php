<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Personagens;
use Illuminate\Http\Request;

class PersonagensController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personagens = Personagens::all();
        return response()->json($personagens);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $personagem = new Personagens();
        $personagem->name = $request->name;
        $personagem->nickname = $request->nickname;
        $personagem->class = $request->class;
        $personagem->level = $request->level;
        $personagem->magic_item_id = $request->magic_item_id;
        $personagem->strength = $request->strength;
        $personagem->defence = $request->defence;
        $personagem->save();

        return response()->json($personagem, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $personagens = Personagens::find($id);
        return response()->json($personagens, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $personagem = Personagens::find($id);
        if (!is_null($personagem)) {
            $personagem->name = $request->name;
            $personagem->nickname = $request->nickname;
            $personagem->class = $request->class;
            $personagem->level = $request->level;
            $personagem->magic_item_id = $request->magic_item_id;
            $personagem->strength = $request->strength;
            $personagem->defence = $request->defence;
            $personagem->save();
        }else{
            return response()->json('Not Found', 404);
        }

        return response()->json($personagem, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Personagens::find($id)->delete();
        return response()->json('Successfully deleted',200);
    }
}
