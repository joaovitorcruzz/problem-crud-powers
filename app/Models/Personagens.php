<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Personagens extends Model
{
    protected $table = 'personagens';

    protected $fillable = [
        'name',
        'nickname',
        'class',
        'level',
        'strength',
        'defence'
    ];

    public function magicItem()
    {
        return $this->hasMany(RxMagicItem::class, 'id', 'personagem_id');
    }
}
