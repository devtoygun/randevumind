<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompanyMedia extends Model
{
    use HasFactory;

    /**
     * Media rows are file references and do not need timestamps.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * File metadata fields that can be stored through upload flows.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_id',
        'media_type',
        'file_size',
        'path',
    ];

    /**
     * File sizes should be handled as integers consistently.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'file_size' => 'integer',
    ];

    /**
     * Each media record belongs to one company.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Each media record belongs to one normalized media type.
     */
    public function mediaType(): BelongsTo
    {
        return $this->belongsTo(MediaType::class, 'media_type');
    }
}
