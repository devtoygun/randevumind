<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MediaType extends Model
{
    use HasFactory;

    /**
     * This lookup table is intentionally timestamp-free.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Only the media type name is editable here.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type_name',
    ];

    /**
     * One media type can be reused by many company media records.
     */
    public function companyMedias(): HasMany
    {
        return $this->hasMany(CompanyMedia::class, 'media_type');
    }
}
