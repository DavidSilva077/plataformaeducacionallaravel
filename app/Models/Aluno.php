<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Aluno extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'matriculas')->withTimestamps();
    }

    public function matriculas()
    {
        return $this->hasMany(Matricula::class);
    }
}
