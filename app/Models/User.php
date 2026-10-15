<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'clinica_id',
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

    /**
     * Relación: a qué clínica pertenece este usuario (admin o veterinario).
     */
    public function clinica()
    {
        return $this->belongsTo(Clinica::class);
    }

    public function cliente(): HasOne
    {
        return $this->hasOne(Cliente::class);
    }

    /**
     * Métodos de ayuda para verificar el rol del usuario.
     */
    public function isOmega(): bool
    {
        return $this->role === 'omega';
    }

    public function isAdmin(): bool
    {
        return $this->role === 'administrador';
    }

    public function isVeterinario(): bool
    {
        return $this->role === 'veterinario';
    }

    public function isCliente(): bool
    {
        return $this->role === 'cliente';
    } 
}