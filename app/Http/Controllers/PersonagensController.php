<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MagicItems;
use App\Models\Personagens;
use App\Models\RxMagicItem;
use Illuminate\Http\Request;

class PersonagensController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personagens = Personagens::all();

        if ($personagens->isEmpty()) {
            return response()->json('Nenhum personagem encontrado', 404);
        }

        return response()->json($personagens);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        if ($request->name == null) {
            return response()->json('Nome inválido, insira outro!', 400);
        }

        if ($request->nickname == null) {
            return response()->json('Apelido inválido, insira outro!', 400);
        }

        if (!in_array($request->class, ["Guerreiro", "Mago", "Arqueiro", "Ladino", "Bardo"])) {
            return response()->json('Classe inválida, insira outra!',400);
        } 
       
        if (($request->strength + $request->defence) > 10) {
            return response()->json('A soma de força e defesa não pode ser maior que 10! sejá decisivo agora, pois seus futuros items magicos serão influencia nessa soma também!', 400);
        }

        $personagem = new Personagens();
        $personagem->name = $request->name;
        $personagem->nickname = $request->nickname;
        $personagem->class = $request->class ?? "Guerreiro";
        $personagem->level = $request->level ?? 1;
        $personagem->strength = $request->strength ?? 0;
        $personagem->defence = $request->defence ?? 0;
        $personagem->save();

        return response()->json($personagem, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $personagens = Personagens::find($id);
        if (is_null($personagens)){
            return response()->json('Personagem não encontrado', 404);
        }

        $magicByPersona = RxMagicItem::where('personagem_id', $id)->pluck('magic_item_id');

        if ($magicByPersona->isNotEmpty()) {
            $magicItems = MagicItems::whereIn('id', $magicByPersona)->get();
            $sumStrength = $magicItems->sum('strength');
            $sumDefence = $magicItems->sum('defence');
        }

        $personagens->strength += $sumStrength ?? 0;
        $personagens->defence += $sumDefence ?? 0;

        return response()->json($personagens, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $personagem = Personagens::find($id);
        if (!is_null($personagem)) {

            if ($request->name == null) {
                return response()->json('Nome inválido, insira outro!', 400);
            }

            if ($request->nickname == null) {
                return response()->json('Apelido inválido, insira outro!', 400);
            }

            if (!in_array($request->class, ["Guerreiro", "Mago", "Arqueiro", "Ladino", "Bardo"])) {
                return response()->json('Classe inválida, insira outra!',400);
            } 
        
            if (($request->strength + $request->defence) > 10) {
                return response()->json('A soma de força e defesa não pode ser maior que 10! sejá decisivo agora, pois seus futuros items magicos serão influencia nessa soma também!', 400);
            }

            $personagem->name = $request->name;
            $personagem->nickname = $request->nickname;
            $personagem->class = $request->class ?? "Guerreiro";
            $personagem->level = $request->level ?? 1;
            $personagem->strength = $request->strength ?? 0;
            $personagem->defence = $request->defence ?? 0;
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
        $personaToDelete = Personagens::where('id',$id)->first();

        if ($personaToDelete == null) {
            return response()->json('Personagem não encontrado', 404);
        }

        $personaToDelete->delete();

        return response()->json('Personagem Excluido!',200);
    }
}
