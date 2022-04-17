<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = "items";

    // Data yang akan dimanipulasi
    protected $fillable = ['name', 'price', 'description', 'thumbnail'];

    /*public function category_item(){
        return $this->hasMany('App\CategoryItem');
    } */

    public function category(){
        return $this->belongsToMany('App\Models\Category');
    }

    public function review(){
        return $this->hasMany('App\Models\Review');
    }
}
