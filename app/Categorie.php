<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $guarded = [];

    public function tickets() {
        return $this->hasMany('App\Tickets')->withTimestamps();
    }
}
