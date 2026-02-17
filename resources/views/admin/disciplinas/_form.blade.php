<div>
    <label for="titulo">Título</label>
    <input id="titulo" type="text" name="titulo" value="{{ old('titulo', $disciplina->titulo ?? '') }}" required>
    @error('titulo')
        <span>{{ $message }}</span>
    @enderror
</div>

<div>
    <label for="descricao">Descrição</label>
    <textarea id="descricao" name="descricao">{{ old('descricao', $disciplina->descricao ?? '') }}</textarea>
    @error('descricao')
        <span>{{ $message }}</span>
    @enderror
</div>

<div>
    <label for="curso_id">Curso</label>
    <select id="curso_id" name="curso_id" required>
        <option value="">Selecione</option>
        @foreach ($cursos as $id => $titulo)
            <option value="{{ $id }}" {{ old('curso_id', $disciplina->curso_id ?? '') == $id ? 'selected' : '' }}>
                {{ $titulo }}
            </option>
        @endforeach
    </select>
    @error('curso_id')
        <span>{{ $message }}</span>
    @enderror
</div>

<div>
    <label for="professor_id">Professor</label>
    <select id="professor_id" name="professor_id" required>
        <option value="">Selecione</option>
        @foreach ($professores as $id => $nome)
            <option value="{{ $id }}" {{ old('professor_id', $disciplina->professor_id ?? '') == $id ? 'selected' : '' }}>
                {{ $nome }}
            </option>
        @endforeach
    </select>
    @error('professor_id')
        <span>{{ $message }}</span>
    @enderror
</div>
