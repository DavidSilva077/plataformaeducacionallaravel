<?php

namespace Tests\Feature;

use Tests\TestCase;
use Carbon\Carbon;
use App\Models\Aluno;
use App\Models\Curso;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\Relatorios\ProfessorJubilutReportService;

class RelatorioMediaIdadeTest extends TestCase
{
    use RefreshDatabase;

    public function testCalculaMediaDeIdadePorCurso()
    {
        Carbon::setTestNow(Carbon::create(2025, 1, 1));

        $curso = factory(Curso::class)->create(['titulo' => 'Biologia']);
        $alunoA = factory(Aluno::class)->create(['data_nascimento' => '2000-01-01']);
        $alunoB = factory(Aluno::class)->create(['data_nascimento' => '2010-01-01']);

        $curso->alunos()->attach([$alunoA->id, $alunoB->id]);

        $service = app(ProfessorJubilutReportService::class);
        $media = $service->mediasPorCurso()->firstWhere('id', $curso->id);

        $this->assertNotNull($media);
        $this->assertEquals(20, (int) round($media->media_idade));

        Carbon::setTestNow();
    }
}
