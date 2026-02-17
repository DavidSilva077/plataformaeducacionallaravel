<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Relatorios\ProfessorJubilutReportService;

class RelatorioProfessorJubilutController extends Controller
{
    public function __invoke(ProfessorJubilutReportService $reportService)
    {
        $medias = $reportService->mediasPorCurso();
        $alunoMaisNovo = $reportService->alunoMaisNovo();
        $alunoMaisVelho = $reportService->alunoMaisVelho();

        return view('admin.relatorios.professor-jubilut', compact('medias', 'alunoMaisNovo', 'alunoMaisVelho'));
    }
}
