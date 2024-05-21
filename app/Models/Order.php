<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'status',
        'total',
        'modified_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'total' => 'decimal:2',
        'created_at' => 'timestamp',
        'modified_at' => 'timestamp',
    ];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'modified_at';
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
