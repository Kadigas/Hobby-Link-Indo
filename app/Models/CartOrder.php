<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartOrder extends Model
{

    use HasFactory;

    protected $table = "cart_orders";

       // Data yang akan dimanipulasi
    protected $fillable = ['total_price', 'shipping_address', 'status', 'shipping_cost', 'user_id'];

     public function user()
     {
         return $this->belongsTo('App\Models\User', 'user_id');
     }

     public function items()
     {
       return $this->belongsToMany(Item::class, 'order_detail', 'cart_order_id', 'item_id');
     }
}