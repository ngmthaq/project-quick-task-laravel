<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const IS_NOT_ADMIN = 0;
    const IS_ADMIN = 1;
    const USER_ACTIVE = 1;
    const USER_UNACTIVE = 0;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'email_verified_at',
        'is_admin',
        'is_active',
        'remember_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Global scopes
    protected static function booted()
    {
        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('is_active', static::USER_ACTIVE);
        });
    }

    // Local scopes
    public function scopeAdmin(Builder $builder)
    {
        return $builder->where('is_admin', static::IS_ADMIN);
    }

    protected $appends = [
        'full_name'
    ];

    // Accessors
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    // Mutators
    public function setUsernameAttribute($username)
    {
        $this->attributes['username'] = Str::slug($username);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'user_id');
    }
}
