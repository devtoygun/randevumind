<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomerProduct extends Model
{
    use HasFactory;

    /**
     * Sold product rows do not currently include timestamp columns.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * These fields mirror the customer product sales schema.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_id',
        'customer_id',
        'product_id',
        'product_price',
        'sell_price',
        'tax_price',
        'price_inc_tax',
        'coupon_code',
        'status',
    ];

    /**
     * Cast monetary fields and booleans consistently across the app.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'product_price' => 'decimal:2',
        'sell_price' => 'decimal:2',
        'tax_price' => 'decimal:2',
        'price_inc_tax' => 'decimal:2',
        'status' => 'boolean',
    ];

    /**
     * Each sold customer product belongs to one company.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Each sold customer product belongs to one customer.
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Each sold customer product references one base product.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Each sold customer product may optionally use one coupon.
     */
    public function coupon(): BelongsTo
    {
        return $this->belongsTo(CouponCode::class, 'coupon_code');
    }
}
