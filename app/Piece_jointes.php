<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Piece_jointes extends Model
{
    protected $guarded = [];

    public function ticket()
    {
        return $this->belongsTo('App\Ticket');
    }
}
