<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MagicItems extends Model
{
    protected $table = 'magic_items';

    protected $fillable = [
        'name',
        'type',
        'strength',
        'defence'
    ];
}
