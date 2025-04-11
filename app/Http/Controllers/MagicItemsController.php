<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MagicItems;
use Illuminate\Http\Request;

class MagicItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $magic_items = MagicItems::all();
        return response()->json($magic_items);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!in_array($request->type, ["Arma", "Armadura", "Amuleto"])) {
            return response()->json('Tipo inválido, insira outro!',400);
        } 
        
        $defence = $request->defence ?? 0;
        $strength = $request->strength ?? 0;

        if ($request->type == "Arma"){
            $defence = 0;
        }
        
        if ($request->type == "Armadura"){
            $strength = 0;
        }

        if ($strength == 0 && $defence == 0) {
            return response()->json('A força e defesa não podem ser 0!', 400);
        }

        if(($strength + $defence) > 10){
            return response()->json('A soma de força e defesa não pode ser maior que 10! ou individualmente!', 400);
        }
        
        $magic_items = new MagicItems();
        $magic_items->name = $request->name;
        $magic_items->type = $request->type;
        $magic_items->strength = $strength;
        $magic_items->defence = $defence;
        $magic_items->save();

        return response()->json($magic_items, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $magic_items = MagicItems::find($id);
        return response()->json($magic_items, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $magic_items = MagicItems::find($id);
        if (!is_null($magic_items)) {
            $magic_items->name = $request->name;
            $magic_items->type = $request->type;
            $magic_items->strength = $request->strength;
            $magic_items->defence = $request->defence;
            $magic_items->save();
        }else{
            return response()->json('Not Found', 404);
        }

        return response()->json($magic_items, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        MagicItems::find($id)->delete();
        return response()->json('Successfully deleted',200);
    }
}
