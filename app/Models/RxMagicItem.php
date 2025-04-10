<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RxMagicItem extends Model
{
    protected $table = 'rx_magic_item';

    protected $fillable = [
        'personagem_id',
        'magic_item_id'
    ];
}
