@extends('layouts.app')

@section('title', 'Relatório Professor Jubilut')

@section('content')
    <h1>Relatório Professor Jubilut</h1>

    <h2>Média de idade por curso</h2>
    <table>
        <thead>
            <tr>
                <th>Curso</th>
                <th>Média de idade</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($medias as $media)
                <tr>
                    <td>{{ $media->titulo }}</td>
                    <td>
                        @if ($media->media_idade !== null)
                            {{ number_format($media->media_idade, 1, ',', '.') }} anos
                        @else
                            —
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">Nenhum curso encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <h2>Aluno mais novo</h2>
    @if ($alunoMaisNovo)
        <p>{{ $alunoMaisNovo->nome }} ({{ optional($alunoMaisNovo->data_nascimento)->age }} anos)</p>
    @else
        <p>Sem alunos com data de nascimento cadastrada.</p>
    @endif

    <h2>Aluno mais velho</h2>
    @if ($alunoMaisVelho)
        <p>{{ $alunoMaisVelho->nome }} ({{ optional($alunoMaisVelho->data_nascimento)->age }} anos)</p>
    @else
        <p>Sem alunos com data de nascimento cadastrada.</p>
    @endif
@endsection
