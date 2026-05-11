<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',      // Add kiya
        'company_id',   // Add kiya
        'created_by',   // Add kiya (tracking ke liye)
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relationship: Is user ko kisne banaya?
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Relationship: Is user ne kaunse users banaye? (Inverse)
     */
    public function createdUsers()
    {
        return $this->hasMany(User::class, 'created_by');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    
    public function loginHistories() {
        return $this->hasMany(LoginHistory::class);
    }

    public function leadActivities() {
        return $this->hasMany(LeadActivity::class);
    }
}