<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $table = 'aluno';
    public $timestamps = true;

    protected $casts = [
        'dataNasc' => 'float'
    ];

    protected $fillable = [
        'name',
        'dataNasc',
        'serie',
        'created_at'
    ];
}