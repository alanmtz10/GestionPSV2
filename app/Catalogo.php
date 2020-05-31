<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    protected $guarded = [];

    public function vendedor()
    {
        return $this->belongsTo(User::class, 'vendedor_id');
    }
}
