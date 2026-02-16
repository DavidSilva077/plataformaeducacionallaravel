<div>
    <label for="titulo">Título</label>
    <input id="titulo" type="text" name="titulo" value="{{ old('titulo', $curso->titulo ?? '') }}" required>
    @error('titulo')
        <span>{{ $message }}</span>
    @enderror
</div>

<div>
    <label for="descricao">Descrição</label>
    <textarea id="descricao" name="descricao">{{ old('descricao', $curso->descricao ?? '') }}</textarea>
    @error('descricao')
        <span>{{ $message }}</span>
    @enderror
</div>

<div>
    <label for="data_inicio">Data de início</label>
    <input id="data_inicio" type="date" name="data_inicio" value="{{ old('data_inicio', optional($curso->data_inicio ?? null)->format('Y-m-d')) }}">
    @error('data_inicio')
        <span>{{ $message }}</span>
    @enderror
</div>

<div>
    <label for="data_fim">Data de fim</label>
    <input id="data_fim" type="date" name="data_fim" value="{{ old('data_fim', optional($curso->data_fim ?? null)->format('Y-m-d')) }}">
    @error('data_fim')
        <span>{{ $message }}</span>
    @enderror
</div>
