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
        $magic_items = new MagicItems();
        $magic_items->name = $request->name;
        $magic_items->type = $request->type;
        $magic_items->strength = $request->strength;
        $magic_items->defence = $request->defence;
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
