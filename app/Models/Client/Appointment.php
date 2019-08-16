<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client\Servant;

class Appointment extends Model
{
    protected $fillable = [
        'protocolo',
        'data_agendada',
        'hora_agendada',
        'servant_id'
    ];

    public function servant()
    {
        return $this->belongsTo(Servant::class);
    }
}
