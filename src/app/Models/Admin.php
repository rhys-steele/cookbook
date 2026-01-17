<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Admin Model
 *
 * Nova admin users. Separate from regular users so we can
 * use the users table for Snap experience later.
 */
class Admin extends Authenticatable
{
    /**
     * Mass-assignable attributes.
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * Attributes that should be hidden for serialization.
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Type-cast attributes to their proper types.
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
