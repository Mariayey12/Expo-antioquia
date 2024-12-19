<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Expo Antioquia</title>
        @vite('resources/js/app.js') <!-- Carga el archivo JavaScript -->
    </head>
    <body>
        <div id="app"></div> <!-- Contenedor donde Vue y Inertia.js montarán la aplicación -->
        @inertia <!-- Esto renderiza la aplicación Vue a través de Inertia.js -->
    </body>
</html>




