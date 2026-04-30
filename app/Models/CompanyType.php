<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CompanyType extends Model
{
    use HasFactory;

    /**
     * The table does not use timestamps, so Eloquent should not expect them.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * These fields are safe for mass assignment in admin forms.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type_name',
        'status',
    ];

    /**
     * Cast boolean flags into native PHP booleans.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'status' => 'boolean',
    ];

    /**
     * One company type can be assigned to many companies.
     */
    public function companies(): HasMany
    {
        // The companies table stores this relation in the "company_type" column.
        return $this->hasMany(Company::class, 'company_type');
    }
}
