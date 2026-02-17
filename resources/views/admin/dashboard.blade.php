@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
    <h1>Área Administrativa</h1>

    <div class="d-flex flex-wrap gap-2">
        <a class="btn btn-outline-primary" href="{{ route('admin.cursos.index') }}">Cursos</a>
        <a class="btn btn-outline-primary" href="{{ route('admin.professores.index') }}">Professores</a>
        <a class="btn btn-outline-primary" href="{{ route('admin.disciplinas.index') }}">Disciplinas</a>
        <a class="btn btn-outline-primary" href="{{ route('admin.alunos.index') }}">Alunos</a>
        <a class="btn btn-outline-primary" href="{{ route('admin.matriculas.index') }}">Matrículas</a>
        <a class="btn btn-outline-primary" href="{{ route('admin.relatorios.professor-jubilut') }}">Relatório Jubilut</a>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <h2 class="h5">Média de idade por curso</h2>
            <canvas id="mediaIdadeChart" height="120"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <script>
        const ctx = document.getElementById('mediaIdadeChart');
        const labels = @json($labels ?? []);
        const data = @json($valores ?? []);

        if (ctx) {
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels,
                    datasets: [{
                        label: 'Idade média',
                        data,
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Anos'
                            }
                        }
                    }
                }
            });
        }
    </script>
@endsection
