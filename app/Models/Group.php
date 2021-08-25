<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description'
    ];
//A Group belongs to a Contact Group
public function group_contact()
{
 return $this->belongsTo('App\ContactGroup');
}


}
