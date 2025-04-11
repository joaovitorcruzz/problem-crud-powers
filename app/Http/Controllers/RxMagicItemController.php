<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MagicItems;
use App\Models\Personagens;
use App\Models\RxMagicItem;
use Illuminate\Http\Request;

class RxMagicItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function service_item_persona($personagem_id)
    {
        $rxMagicItem = RxMagicItem::where('personagem_id',$personagem_id)->pluck('magic_item_id');

        $magicItem = MagicItems::whereIn('id', $rxMagicItem)->get();

        return response($magicItem, 200);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function service_item_persona_to_add($personagem_id, $magic_item_id)
    {
        $magicItem = MagicItems::find($magic_item_id);
        $personagem = Personagens::find($personagem_id);
        // dd($magicItem, $personagem);
        $rxMagicItem = new RxMagicItem();
        $rxMagicItem->magic_item_id = $magicItem->id;
        $rxMagicItem->personagem_id = $personagem->id;
        $rxMagicItem->save();

            return response($rxMagicItem, 201);
    }

    /**
     * Display a listing of the resource.
     */
    public function service_item_persona_to_remove($personagem_id, $magic_item_id)
    {
        $rxMagicItemToDelete = RxMagicItem::where('magic_item_id', $magic_item_id)->where('personagem_id', $personagem_id)->delete();
    
        return response('Magia removida do Personagem', 200);
    }    
}
