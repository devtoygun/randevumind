<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
        'code',
        'expiry',
        'discount_rate',
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
        'status' => 'boolean',
    ];

    /**
     * One coupon can be referenced by many sold customer service packages.
     */
    public function customerServices(): HasMany
    {
        // The customer_services table stores the foreign key in "coupon_code".
        return $this->hasMany(CustomerService::class, 'coupon_code');
    }
}
