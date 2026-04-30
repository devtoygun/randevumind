<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    /**
     * Customer records are maintained without timestamps in the current schema.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * These fields represent the editable customer profile.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_id',
        'firstname',
        'lastname',
        'gender',
        'birthdate',
        'email',
        'phone',
        'status',
    ];

    /**
     * Normalize booleans and dates when reading customer rows.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'gender' => 'boolean',
        'birthdate' => 'date',
        'status' => 'boolean',
    ];

    /**
     * Each customer belongs to a company.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * A customer can buy many service packages.
     */
    public function customerServices(): HasMany
    {
        return $this->hasMany(CustomerService::class);
    }

    /**
     * A customer can have many appointments.
     */
    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }
}
