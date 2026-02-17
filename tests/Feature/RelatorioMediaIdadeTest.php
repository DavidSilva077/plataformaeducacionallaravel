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

    public function testRetornaAlunoMaisNovoEMaisVelho()
    {
        $maisVelho = factory(Aluno::class)->create([
            'nome' => 'Aluno Mais Velho',
            'data_nascimento' => '1980-01-01',
        ]);
        $maisNovo = factory(Aluno::class)->create([
            'nome' => 'Aluno Mais Novo',
            'data_nascimento' => '2010-01-01',
        ]);
        factory(Aluno::class)->create([
            'nome' => 'Aluno Sem Data',
            'data_nascimento' => null,
        ]);

        $service = app(ProfessorJubilutReportService::class);

        $this->assertEquals($maisNovo->id, optional($service->alunoMaisNovo())->id);
        $this->assertEquals($maisVelho->id, optional($service->alunoMaisVelho())->id);
    }
}
