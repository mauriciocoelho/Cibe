<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventoDetails extends Model
{
    protected $table = 'evento_details';

    public function evento()
    {
        return $this->belongsTo('App\Evento', 'evento_id', 'id');
    }

    public function pessoa()
    {
        return $this->belongsTo('App\Pessoa', 'pessoa_id', 'id');
    }

    public function congregacao()
    {
        return $this->belongsTo('App\Congregacao', 'congregacao_id', 'id');
    }
}
