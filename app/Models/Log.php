<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Log extends Model
{
    use HasFactory;

    /**
     * Request log rows are append-only and do not use timestamps here.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Log writers can safely fill these audit columns.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'event',
        'url',
        'method',
        'ip_address',
        'device_type',
        'browser',
        'browser_version',
        'platform',
        'platform_version',
    ];

    /**
     * Each log row may belong to a user, but guest traffic is also possible.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
