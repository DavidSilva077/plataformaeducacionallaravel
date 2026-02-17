<?php

Route::prefix('admin')
    ->as('admin.')
    ->middleware('web')
    ->group(function () {
        Route::get('/login', 'Admin\\Auth\\LoginController@showLoginForm')->name('login');
        Route::post('/login', 'Admin\\Auth\\LoginController@login')->name('login.submit');
        Route::post('/logout', 'Admin\\Auth\\LoginController@logout')->name('logout');

        Route::middleware('auth.admin')->group(function () {
            Route::get('/dashboard', 'Admin\\DashboardController@index')->name('dashboard');
            Route::resource('cursos', 'Admin\\CursoController');
            Route::resource('professores', 'Admin\\ProfessorController');
            Route::resource('disciplinas', 'Admin\\DisciplinaController');
            Route::resource('alunos', 'Admin\\AlunoController');
            Route::resource('matriculas', 'Admin\\MatriculaController')->only(['index', 'create', 'store', 'destroy']);
            Route::get('relatorios/professor-jubilut', 'Admin\\RelatorioProfessorJubilutController')
                ->name('relatorios.professor-jubilut');
        });
    });
