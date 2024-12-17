<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <!-- Agregar estilos si los tienes -->
</head>
<body>
    <h1>Iniciar sesión</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Campo de correo electrónico -->
        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required>

        <!-- Campo de contraseña -->
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>

        <!-- Mostrar errores si los hay -->
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <button type="submit">Iniciar sesión</button>
    </form>

    <a href="{{ route('register') }}">¿No tienes una cuenta? Regístrate aquí</a>
</body>
</html>
