<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductCategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'desc',
        'parent_id',
        'modified_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'parent_id' => 'integer',
        'created_at' => 'timestamp',
        'modified_at' => 'timestamp',
        'deleted_at' => 'timestamp',
    ];
    const UPDATED_AT = 'modified_at';

    public function parent(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
