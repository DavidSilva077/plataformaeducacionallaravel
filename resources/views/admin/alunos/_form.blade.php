<div>
    <label for="nome">Nome</label>
    <input id="nome" type="text" name="nome" value="{{ old('nome', $aluno->nome ?? '') }}" required>
    @error('nome')
        <span>{{ $message }}</span>
    @enderror
</div>

<div>
    <label for="email">E-mail</label>
    <input id="email" type="email" name="email" value="{{ old('email', $aluno->email ?? '') }}" required>
    @error('email')
        <span>{{ $message }}</span>
    @enderror
</div>

<div>
    <label for="data_nascimento">Data de nascimento</label>
    <input id="data_nascimento" type="date" name="data_nascimento" value="{{ old('data_nascimento', optional($aluno->data_nascimento ?? null)->format('Y-m-d')) }}">
    @error('data_nascimento')
        <span>{{ $message }}</span>
    @enderror
</div>
