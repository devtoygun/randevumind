<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    /**
     * The roles table is a static reference table without timestamps.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Role management screens can safely fill these columns.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_name',
        'is_admin',
        'access_code',
    ];

    /**
     * Keep admin flags strongly typed for authorization checks.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_admin' => 'boolean',
    ];
}
