<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelPeoples extends Model
{
    //
    protected $table ='model_people';
    protected $primaryKey = 'id_people';
    protected $fillable = [
        'firstname',
        'lastname',
        'gender',
        'm_state',
        'nationality',
        'city_id',
        'identity_code'
    ];


    public function relIdentity(){
        return $this->hasOne('App\Models\ModelIdentities','id_identity','identity_code');
    }
    public function relWorker(){
        return $this->hasOne('App\Models\ModelWorker','people_id','id_people');
    }
    public function relUser(){
        return $this->hasOne('App\Models\ModelUser','people_id','id_people');
    }
    public function relCity(){
        return $this->hasOne('App\Models\ModelCity','id_city','city_id');
    }
    public function relStudent(){
        return $this->belongsTo('App\Models\ModelStudent','id_people','people_id');
    }
    /*public function relStudent(){
        return $this->hasOne('App\Models\ModelStudent','people_id','id_people');
    }*/
}
