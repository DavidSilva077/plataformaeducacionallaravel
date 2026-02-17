<div class="mb-3">
    <label for="titulo" class="form-label">Título</label>
    <input id="titulo" type="text" name="titulo" value="{{ old('titulo', $disciplina->titulo ?? '') }}" required class="form-control">
    @error('titulo')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="descricao" class="form-label">Descrição</label>
    <textarea id="descricao" name="descricao" class="form-control">{{ old('descricao', $disciplina->descricao ?? '') }}</textarea>
    @error('descricao')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="curso_id" class="form-label">Curso</label>
    <select id="curso_id" name="curso_id" required class="form-select">
        <option value="">Selecione</option>
        @foreach ($cursos as $id => $titulo)
            <option value="{{ $id }}" {{ old('curso_id', $disciplina->curso_id ?? '') == $id ? 'selected' : '' }}>
                {{ $titulo }}
            </option>
        @endforeach
    </select>
    @error('curso_id')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="professor_id" class="form-label">Professor</label>
    <select id="professor_id" name="professor_id" required class="form-select">
        <option value="">Selecione</option>
        @foreach ($professores as $id => $nome)
            <option value="{{ $id }}" {{ old('professor_id', $disciplina->professor_id ?? '') == $id ? 'selected' : '' }}>
                {{ $nome }}
            </option>
        @endforeach
    </select>
    @error('professor_id')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
