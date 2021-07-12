<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $guarded = [];

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function categorie()
    {
        return $this->belongsTo('App\Categorie');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function piece_jointes()
    {
        return $this->hasMany('App\Piece_jointes');
    }
}
