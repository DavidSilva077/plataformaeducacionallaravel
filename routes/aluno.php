<?php

Route::prefix('aluno')
    ->as('aluno.')
    ->middleware(['web', 'auth:aluno'])
    ->group(function () {
        Route::get('/dashboard', 'Aluno\DashboardController@index')->name('dashboard');
    });
