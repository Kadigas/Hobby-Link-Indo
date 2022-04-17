<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = "profiles";

    // Data yang akan dimanipulasi
    protected $fillable = ['address', 'phone', 'user_id'];

     // One to one yang ada foreign key 
     public function user()
     {
         return $this->belongsTo('App\Models\User', 'user_id');
     }
}
