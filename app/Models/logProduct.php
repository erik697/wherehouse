<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LogProduct extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Wherehouse_product_id',
        'amount',
        'type',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Wherehouse_product_id' => 'integer',
    ];

    public function wherehouseProduct(): BelongsTo
    {
        return $this->belongsTo(WherehouseProduct::class,'Wherehouse_product_id', 'id');
    }
}
