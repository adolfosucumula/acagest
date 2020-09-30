<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelCountries extends Model
{
    //
    protected $table ='model_countries';
    protected $primaryKey = 'id_country';

    public function relProvince(){
        return $this->hasMany('App\Models\ModelProvinces','country_id','id_country');
    }
}
