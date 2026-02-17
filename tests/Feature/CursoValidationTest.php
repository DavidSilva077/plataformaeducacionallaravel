<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class CursoValidationTest extends TestCase
{
    use RefreshDatabase;

    public function testNaoPermiteDataFimAnteriorDataInicio()
    {
        $this->withoutMiddleware(VerifyCsrfToken::class);

        $admin = Admin::create([
            'name' => 'Admin Curso',
            'email' => 'admin-curso@teste.com',
            'password' => Hash::make('123456'),
        ]);

        $response = $this->actingAs($admin, 'admin')
            ->from(route('admin.cursos.create'))
            ->post(route('admin.cursos.store'), [
                'titulo' => 'Curso Invalido',
                'descricao' => 'Descricao',
                'data_inicio' => '2025-01-10',
                'data_fim' => '2025-01-01',
            ]);

        $response->assertRedirect(route('admin.cursos.create'));
        $response->assertSessionHasErrors('data_fim');
        $this->assertDatabaseMissing('cursos', ['titulo' => 'Curso Invalido']);
    }
}
