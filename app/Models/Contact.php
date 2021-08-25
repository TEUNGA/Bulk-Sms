<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'users_id',
        'users_phone',
        'users_name'
];

public $timestamps = false;
//A Contact belongs to a contact group

public function contact_group()
{
 return $this->belongsTo('App\ContactGroup');
}

   
}
