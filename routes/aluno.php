<?php

Route::prefix('aluno')
    ->as('aluno.')
    ->middleware('web')
    ->group(function () {
        Route::get('/login', 'Aluno\\Auth\\LoginController@showLoginForm')->name('login');
        Route::post('/login', 'Aluno\\Auth\\LoginController@login')->name('login.submit');
        Route::post('/logout', 'Aluno\\Auth\\LoginController@logout')->name('logout');

        Route::middleware('auth.aluno')->group(function () {
            Route::get('/dashboard', 'Aluno\\DashboardController@index')->name('dashboard');
            Route::get('/perfil', 'Aluno\\ProfileController@edit')->name('profile.edit');
            Route::put('/perfil', 'Aluno\\ProfileController@update')->name('profile.update');
        });
    });
