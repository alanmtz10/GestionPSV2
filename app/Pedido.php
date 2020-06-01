<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $guarded = [];

    public function cliente()
    {
        return $this->belongsTo(User::class, 'cliente_id');
    }
}
