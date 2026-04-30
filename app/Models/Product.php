<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    /**
     * Products are catalog rows without timestamp columns.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * These are the editable product definition fields.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_id',
        'product_name',
        'product_detail',
        'product_img',
        'cost_price',
        'sell_price',
        'tax_rate',
        'status',
    ];

    /**
     * Product pricing and status values should remain strongly typed.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'cost_price' => 'decimal:2',
        'sell_price' => 'decimal:2',
        'tax_rate' => 'decimal:2',
        'status' => 'boolean',
    ];

    /**
     * Each product belongs to a company.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
