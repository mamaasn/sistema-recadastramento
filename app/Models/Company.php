<?php

namespace App\Models;

use App\Models\Address;
use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Company extends Model
{
    /**
     * Atributos que podem ser inseridos
     */
    protected $fillable = [
        'uuid',
        'cnpj',
        'razao_social',
        'nome_fantasia',
        'telefone',
        'telefone2',
        'email',
        'sub_domain',
        'bd_hostname',
        'bd_port',
        'bd_database',
        'bd_username',
        'bd_password',
        'address_id'
    ];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    /**
     *  Setup model event hooks
     */
    public static function boot()
    {
        parent::boot();
        
        self::creating(function ($model) {
            $model->uuid = (string)Uuid::generate(4);
        });
    }
}
