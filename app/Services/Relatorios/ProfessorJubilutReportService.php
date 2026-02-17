<?php

namespace App\Services\Relatorios;

use App\Models\Aluno;
use App\Models\Curso;
use Illuminate\Support\Collection;

class ProfessorJubilutReportService
{
    public function mediasPorCurso(): Collection
    {
        $cursos = Curso::with(['alunos' => function ($query) {
            $query->whereNotNull('data_nascimento');
        }])->orderBy('titulo')->get();

        return $cursos->map(function (Curso $curso) {
            $idades = $curso->alunos
                ->filter(function (Aluno $aluno) {
                    return $aluno->data_nascimento !== null;
                })
                ->map(function (Aluno $aluno) {
                    return $aluno->data_nascimento->age;
                });

            $media = $idades->count() ? $idades->avg() : null;

            return (object) [
                'id' => $curso->id,
                'titulo' => $curso->titulo,
                'media_idade' => $media,
            ];
        });
    }

    public function alunoMaisNovo(): ?Aluno
    {
        return Aluno::whereNotNull('data_nascimento')
            ->orderByDesc('data_nascimento')
            ->first();
    }

    public function alunoMaisVelho(): ?Aluno
    {
        return Aluno::whereNotNull('data_nascimento')
            ->orderBy('data_nascimento')
            ->first();
    }
}
