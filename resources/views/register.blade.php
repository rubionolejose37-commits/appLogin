<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    
    
    <link rel="stylesheet" href="{{ asset('ccs/css/app.css') }}">
</head>
<body>

<div class="form-container">
    <h1>Registro de Estudiante</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <ul class="alert alert-error">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ url('/register') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="email">Correo:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirmar Contraseña:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <div class="form-group">
            <label for="career_id">Carrera:</label>
            <select name="career_id" id="career_id" required>
                <option value="">Seleccione una carrera...</option>
                @foreach($careers as $career)
                    <option value="{{ $career->id }}" {{ old('career_id') == $career->id ? 'selected' : '' }}>
                        {{ $career->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <label class="form-check" for="terms_accepted">
            <input type="checkbox" name="terms_accepted" id="terms_accepted" value="1" required>
            <span>Acepto los términos y condiciones</span>
        </label>

        <button type="submit" class="btn-submit">Registrar</button>
    </form>
</div>
