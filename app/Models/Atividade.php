<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Atividade extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'nome',
        'tipo',
        'descricao',
        'horas_declaradas',
        'data_atividade',
        'caminho_certificado',
        'status',
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
