<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    protected $table = 'cart_item';
    protected $guarded = ['id'];
    
    public function shoppingSession() {
        return $this->belongsTo(ShoppingCartSession::class, 'session_id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
