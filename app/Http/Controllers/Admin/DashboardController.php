<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Relatorios\ProfessorJubilutReportService;

class DashboardController extends Controller
{
    public function index(ProfessorJubilutReportService $reportService)
    {
        $medias = $reportService->mediasPorCurso();
        $labels = $medias->pluck('titulo');
        $valores = $medias->pluck('media_idade')->map(function ($media) {
            return $media === null ? null : round($media, 1);
        });

        return view('admin.dashboard', compact('labels', 'valores'));
    }
}
