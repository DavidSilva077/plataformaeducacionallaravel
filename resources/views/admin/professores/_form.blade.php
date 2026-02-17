<div class="mb-3">
    <label for="nome" class="form-label">Nome</label>
    <input id="nome" type="text" name="nome" value="{{ old('nome', $professor->nome ?? '') }}" required class="form-control">
    @error('nome')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="email" class="form-label">E-mail</label>
    <input id="email" type="email" name="email" value="{{ old('email', $professor->email ?? '') }}" class="form-control">
    @error('email')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
