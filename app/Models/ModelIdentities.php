<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelIdentities extends Model
{
    protected $table = 'model_identities';
    protected $primaryKey = 'id_identity';
    protected $fillable = [
        'identity',
        'exp_date'
    ];

    public function relPeople(){
        return $this->belongsTo('App\Models\ModelPeoples','id_identity','identity_code');
    }
}
