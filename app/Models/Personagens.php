<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personagens extends Model
{
    protected $table = 'personagens';

    protected $fillable = [
        'name',
        'nickname',
        'class',
        'level',
        'magic_item_id',
        'strength',
        'defence'
    ];
}
