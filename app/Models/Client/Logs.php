<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client\Servant;
use App\Models\Client\Dependent;
use App\Models\Client\Time;
use App\Models\Client\Founder;
use App\Models\User;

class Logs extends Model
{
    protected $fillable = [
        'acoes',
        'user_id',
        'servant_id',
        'dependent_id',
        'time_id',
        'founder_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function servant()
    {
        return $this->belongsTo(Servant::class);
    }

    public function dependent()
    {
        return $this->belongsTo(Dependent::class);
    }

    public function time()
    {
        return $this->belongsTo(Time::class);
    }

    public function founder()
    {
        return $this->belongsTo(Founder::class);
    }

}
