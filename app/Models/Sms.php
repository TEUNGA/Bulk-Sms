<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    use HasFactory;

     // A Sms has many contacts
public function contacts(){
    return $this->hasMany('App\Contact');
}

// A Sms has many groups
public function groups(){
    return $this->hasMany('App\Group');
}


    protected $fillable = [
        'contact_id',
        'contact_name',
        'contact_phone',
        'group_id',
        'group_name',
        'sms_title',
        'sms_body'

];
}
