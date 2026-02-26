<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function collocations(): BelongsToMany
    {
        return $this->belongsToMany(Collocation::class, 'collocation_user')
            ->withTimestamps()
            ->withPivot(['is_owner', 'status']);
    }


    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function invitations(): HasMany
    {
        return $this->hasMany(Invitation::class);
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
    public function depense(): HasMany
    {
        return $this->hasMany(Depense::class);
    }

    public function check_collocation()
    {
        return $this->collocations->exists();
    }

    public function isAdmin(): bool
    {
        return $this->role?->role === 'Admin';
    }

    public function isOwnerOf(Collocation $collocation): bool
    {
        return $collocation->users()
            ->where('user_id', $this->id)
            ->wherePivot('is_owner', true)
            ->exists();
    }
}
