<?php

Route::prefix('admin')
    ->as('admin.')
    ->middleware(['web', 'auth:admin'])
    ->group(function () {
        Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');
    });
