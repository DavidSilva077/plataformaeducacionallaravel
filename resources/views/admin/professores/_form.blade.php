<div>
    <label for="nome">Nome</label>
    <input id="nome" type="text" name="nome" value="{{ old('nome', $professor->nome ?? '') }}" required>
    @error('nome')
        <span>{{ $message }}</span>
    @enderror
</div>

<div>
    <label for="email">E-mail</label>
    <input id="email" type="email" name="email" value="{{ old('email', $professor->email ?? '') }}">
    @error('email')
        <span>{{ $message }}</span>
    @enderror
</div>
