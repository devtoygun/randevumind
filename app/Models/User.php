<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * These fields match the lean user profile schema defined in the migration.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'emailverifiedat',
        'phoneverifiedat',
        'birthday',
        'gender',
        'status',
        'first_login',
    ];

    /**
     * No hidden auth-only attributes are kept because the custom schema
     * does not include password or remember token columns right now.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            // Verification timestamps are queried often, so cast them eagerly.
            'emailverifiedat' => 'datetime',
            'phoneverifiedat' => 'datetime',

            // Profile metadata benefits from native PHP date and boolean casting.
            'birthday' => 'date',
            'gender' => 'boolean',
            'status' => 'boolean',
            'first_login' => 'boolean',
        ];
    }
}
