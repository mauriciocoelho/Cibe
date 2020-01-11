<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = 'pessoas';

    public function congregacao()
    {
        return $this->belongsTo('App\Congregacao', 'congregacao_id', 'id');
    }
}
