<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelWorkers extends Model
{
    //
    protected $primaryKey = 'id_worker';
    protected $fillable = [
        'category',
        'people_id',
        'contact_id'
    ];

    public function relPeople(){
        return $this->belongsTo('App\Models\ModelPeoples','people_id','id_people');
    }
    public function relContacts(){
        return $this->hasMany('App\Models\ModelContacts','id_contact');
    }
}
