<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelContacts extends Model
{
    //
    protected $table ='model_contacts';
    protected $primaryKey = 'id_contact';
    
    protected $fillable = [
        'telephone',
        'cellphone',
        'homephone',
        'email'
    ];

    public function relStudent(){
        return $this->belongsTo('App\Models\ModelStudent','id_contact','contact_id');
    }
    
    public function relUser(){
        return $this->belongsTo('App\Models\ModelUser','id_contact','contact_id');
    }
    public function relWorker(){
        return $this->hasOne('App\Models\ModelWorkers','id_contact', 'contact_id');
    }
}
