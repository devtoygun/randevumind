<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    /**
     * Company rows are plain business records without timestamps.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * These attributes cover the editable company profile fields.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_name',
        'company_type',
        'owner',
        'address',
        'tax_number',
        'tax_office',
        'status',
    ];

    /**
     * Boolean casting keeps status checks predictable.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'status' => 'boolean',
    ];

    /**
     * Each company belongs to a single company type.
     */
    public function companyType(): BelongsTo
    {
        return $this->belongsTo(CompanyType::class, 'company_type');
    }

    /**
     * Each company belongs to one owning user.
     */
    public function ownerUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner');
    }

    /**
     * A company can have many member records.
     */
    public function members(): HasMany
    {
        return $this->hasMany(CompanyMember::class);
    }

    /**
     * A company can have many customers.
     */
    public function customers(): HasMany
    {
        return $this->hasMany(Customer::class);
    }

    /**
     * A company can store many uploaded media assets.
     */
    public function medias(): HasMany
    {
        return $this->hasMany(CompanyMedia::class);
    }

    /**
     * A company can define many services.
     */
    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    /**
     * A company can define many products.
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * A company can sell many customer service packages.
     */
    public function customerServices(): HasMany
    {
        return $this->hasMany(CustomerService::class);
    }

    /**
     * A company can sell many customer product rows.
     */
    public function customerProducts(): HasMany
    {
        return $this->hasMany(CustomerProduct::class);
    }

    /**
     * A company can have many appointments.
     */
    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    /**
     * A company can issue many coupon codes.
     */
    public function couponCodes(): HasMany
    {
        return $this->hasMany(CouponCode::class);
    }
}
