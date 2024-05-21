<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductVariant extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'size_id',
        'color_id',
        'quantity',
        'created_at',
        'modified_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_id' => 'integer',
        'size_id' => 'integer',
        'color_id' => 'integer',
        'created_at' => 'timestamp',
        'modified_at' => 'timestamp',
    ];
    const UPDATED_AT = 'modified_at';

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function size(): BelongsTo
    {
        return $this->belongsTo(ProductSize::class);
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(ProductColor::class);
    }
}
