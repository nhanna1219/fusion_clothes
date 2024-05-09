<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'modified_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'order_id' => 'integer',
        'product_id' => 'integer',
        'created_at' => 'timestamp',
        'modified_at' => 'timestamp',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(OrderDetail::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class);
    }
}
