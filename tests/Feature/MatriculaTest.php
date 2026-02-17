<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Aluno;
use App\Models\Curso;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MatriculaTest extends TestCase
{
    use RefreshDatabase;

    public function testAlunoPodeSerMatriculadoEmMultiplosCursos()
    {
        $aluno = factory(Aluno::class)->create();
        $cursoA = factory(Curso::class)->create();
        $cursoB = factory(Curso::class)->create();

        $aluno->cursos()->attach([$cursoA->id, $cursoB->id]);

        $this->assertDatabaseHas('matriculas', [
            'aluno_id' => $aluno->id,
            'curso_id' => $cursoA->id,
        ]);

        $this->assertDatabaseHas('matriculas', [
            'aluno_id' => $aluno->id,
            'curso_id' => $cursoB->id,
        ]);
    }
}
