<div class="mb-3">
    <label for="titulo" class="form-label">Título</label>
    <input id="titulo" type="text" name="titulo" value="{{ old('titulo', $curso->titulo ?? '') }}" required class="form-control">
    @error('titulo')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="descricao" class="form-label">Descrição</label>
    <textarea id="descricao" name="descricao" class="form-control">{{ old('descricao', $curso->descricao ?? '') }}</textarea>
    @error('descricao')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="data_inicio" class="form-label">Data de início</label>
    <input id="data_inicio" type="date" name="data_inicio" value="{{ old('data_inicio', optional($curso->data_inicio ?? null)->format('Y-m-d')) }}" class="form-control">
    @error('data_inicio')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="data_fim" class="form-label">Data de fim</label>
    <input id="data_fim" type="date" name="data_fim" value="{{ old('data_fim', optional($curso->data_fim ?? null)->format('Y-m-d')) }}" class="form-control">
    @error('data_fim')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
