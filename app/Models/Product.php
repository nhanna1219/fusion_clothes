<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $guarded = ['id'];
    public function variants() {
        return $this->hasMany(ProductVariant::class);
    }

    public function category() {
        return $this->belongsTo(ProductCategory::class);
    }

    public function inventory() {
        return $this->hasOne(ProductInventory::class);
    }

    public function cartItems() {
        return $this->hasMany(CartItem::class);
    }

    public function orderDetails() {
        return $this->hasMany(OrderDetail::class);
    }
}
