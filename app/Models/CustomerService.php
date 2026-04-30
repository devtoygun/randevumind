<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CustomerService extends Model
{
    use HasFactory;

    /**
     * Sold service package rows do not currently store timestamps.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * These fields map directly to the purchased service package schema.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_id',
        'customer_id',
        'service_id',
        'total_session',
        'service_price',
        'sell_price',
        'tax_price',
        'price_inc_tax',
        'coupon_code',
        'status',
    ];

    /**
     * Cast quantities, booleans, and prices consistently.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'total_session' => 'integer',
        'service_price' => 'decimal:2',
        'sell_price' => 'decimal:2',
        'tax_price' => 'decimal:2',
        'price_inc_tax' => 'decimal:2',
        'status' => 'boolean',
    ];

    /**
     * Each sold service package belongs to a company.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Each sold service package belongs to a customer.
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Each sold service package references one base service definition.
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * A sold service package may optionally use one coupon code.
     */
    public function coupon(): BelongsTo
    {
        return $this->belongsTo(CouponCode::class, 'coupon_code');
    }

    /**
     * One sold service package can be used across many appointments.
     */
    public function appointments(): HasMany
    {
        // The appointments table stores this relation in its "service_id" column.
        return $this->hasMany(Appointment::class, 'service_id');
    }
}
