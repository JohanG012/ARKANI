<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = [
        'mascota_id',
        'veterinario_id',
        'clinica_id',
        'fecha',
        'hora',
        'motivo',
        'estado',
        'notas',
    ];

    protected $casts = [
        'fecha' => 'date',
    ];

    public function mascota()
    {
        return $this->belongsTo(Mascota::class);
    }

    public function veterinario()
    {
        return $this->belongsTo(Veterinario::class);
    }

    public function clinica()
    {
        return $this->belongsTo(Clinica::class);
    }
}