<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'area',
    ];

    public function disciplinas()
    {
        return $this->hasMany(Disciplina::class);
    }

    public function alunos()
    {
        return $this->belongsToMany(Aluno::class, 'matriculas')->withTimestamps();
    }

    public function matriculas()
    {
        return $this->hasMany(Matricula::class);
    }
}
