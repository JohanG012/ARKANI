<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mascota extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'nombre',
        'especie',
        'raza',
        'fecha_nacimiento',
        'sexo',
        'peso',
        'color',
        'foto',
    ];

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }
}
