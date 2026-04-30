<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CouponCode extends Model
{
    use HasFactory;

    /**
     * Coupon rows are maintained as simple reference records without timestamps.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * These attributes cover the editable coupon configuration fields.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_id',
        'code',
        'expiry',
        'discount_rate',
        'for_wich',
        'status',
    ];

    /**
     * Monetary and date values should be normalized automatically.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'expiry' => 'date',
        'discount_rate' => 'decimal:2',
        // False can represent service, while true can represent product usage.
        'for_wich' => 'boolean',
        'status' => 'boolean',
    ];

    /**
     * Each coupon code belongs to one company.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * One coupon can be referenced by many sold customer service packages.
     */
    public function customerServices(): HasMany
    {
        // The customer_services table stores the foreign key in "coupon_code".
        return $this->hasMany(CustomerService::class, 'coupon_code');
    }

    /**
     * One coupon can also be referenced by many sold customer product rows.
     */
    public function customerProducts(): HasMany
    {
        // The customer_products table uses the same "coupon_code" foreign key pattern.
        return $this->hasMany(CustomerProduct::class, 'coupon_code');
    }
}
