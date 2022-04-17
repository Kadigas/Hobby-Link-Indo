<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = "order_detail";

    // Data yang akan dimanipulasi
    protected $fillable = ['price', 'quantity', 'item_id', 'cart_order_id'];
}
