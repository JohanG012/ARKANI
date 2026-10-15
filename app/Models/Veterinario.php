<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veterinario extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'especialidad',
        'telefono',
        'numero_tarjeta_profesional',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function clinica()
    {
        return $this->user->clinica;
    }
}