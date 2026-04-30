<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    use HasFactory;

    /**
     * Appointment rows are stored without timestamps in the current schema.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * These fields cover the editable scheduling payload.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_id',
        'customer_id',
        'service_id',
        'event_start',
        'event_end',
        'session_count',
        'created_by',
        'status',
    ];

    /**
     * Cast scheduling fields into native date, int, and boolean values.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'event_start' => 'datetime',
        'event_end' => 'datetime',
        'session_count' => 'integer',
        'status' => 'boolean',
    ];

    /**
     * Each appointment belongs to a company.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Each appointment belongs to a customer.
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Each appointment points to a sold customer service package.
     */
    public function customerService(): BelongsTo
    {
        // The schema names this foreign key "service_id" even though it points to customer_services.
        return $this->belongsTo(CustomerService::class, 'service_id');
    }

    /**
     * Each appointment keeps a reference to the user who created it.
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
