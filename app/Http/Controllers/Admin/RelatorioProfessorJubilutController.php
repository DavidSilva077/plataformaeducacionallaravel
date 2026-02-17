<?php

namespace App\Http\Controllers\Admin;

use App\Models\Aluno;
use App\Models\Curso;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RelatorioProfessorJubilutController extends Controller
{
    public function __invoke()
    {
        $medias = Curso::leftJoin('matriculas', 'cursos.id', '=', 'matriculas.curso_id')
            ->leftJoin('alunos', function ($join) {
                $join->on('alunos.id', '=', 'matriculas.aluno_id')
                    ->whereNotNull('alunos.data_nascimento');
            })
            ->select(
                'cursos.id',
                'cursos.titulo',
                DB::raw('AVG(TIMESTAMPDIFF(YEAR, alunos.data_nascimento, CURDATE())) as media_idade')
            )
            ->groupBy('cursos.id', 'cursos.titulo')
            ->orderBy('cursos.titulo')
            ->get();

        $alunoMaisNovo = Aluno::whereNotNull('data_nascimento')
            ->orderByDesc('data_nascimento')
            ->first();

        $alunoMaisVelho = Aluno::whereNotNull('data_nascimento')
            ->orderBy('data_nascimento')
            ->first();

        return view('admin.relatorios.professor-jubilut', compact('medias', 'alunoMaisNovo', 'alunoMaisVelho'));
    }
}
