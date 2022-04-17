<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryItem extends Model
{
    use HasFactory;

    protected $table = "category_item";

    // Data yang akan dimanipulasi
    protected $fillable = ['category_id', 'item_id'];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function item(){
        return $this->belongsTo('App\Models\Item');
    }
}
