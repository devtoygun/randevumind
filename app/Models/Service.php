<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;

    /**
     * Service rows are catalog entries without timestamp columns.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The fillable list mirrors the service catalog schema.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_id',
        'service_name',
        'service_detail',
        'total_session',
        'price',
        'tax_rate',
        'status',
    ];

    /**
     * Cast counts, money, and booleans to predictable PHP types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'total_session' => 'integer',
        'price' => 'decimal:2',
        'tax_rate' => 'decimal:2',
        'status' => 'boolean',
    ];

    /**
     * Each service belongs to a company.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * A service can be sold to many customers through service package rows.
     */
    public function customerServices(): HasMany
    {
        return $this->hasMany(CustomerService::class);
    }
}
