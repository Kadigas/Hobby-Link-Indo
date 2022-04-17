<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $table = "categories";

    // set timestamps ke false
    public $timestamps = false;

    // Data yang akan dimanipulasi
    protected $fillable = ['name'];

    public function item(){
        return $this->belongsToMany('App\Models\Item');
    }
}
