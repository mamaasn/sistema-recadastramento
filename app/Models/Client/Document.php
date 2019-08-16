<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client\Servant;

class Document extends Model
{

    protected $fillable = [
        'path',
        'fileName',
        'servant_id',
    ];

    /***************************************************************************************
     * Relações 1 x N
     */
    public function servant()
    {
        return $this->belongsTo(Servant::class);
    }
}
