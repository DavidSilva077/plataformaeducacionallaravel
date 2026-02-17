<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::updateOrCreate(
            ['email' => 'admin@teste.com'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('123456'),
            ]
        );
    }
}
