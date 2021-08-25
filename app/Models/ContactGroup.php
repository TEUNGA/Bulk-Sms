<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactGroup extends Model
{
    use HasFactory;
    // A contact group has many contacts
public function contacts(){
    return $this->hasMany('App\Contact');
}


    protected $fillable = [
        'contact_id',
        'contact_name',
        'contact_phone',
        'group_id',
        'group_name'
];

}
