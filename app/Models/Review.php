<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = "review";

    // Data yang akan dimanipulasi
    protected $fillable = ['content', 'rating', 'user_id', 'item_id'];

    public function item(){
        return $this->belongsTo('App\Models\Item');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
