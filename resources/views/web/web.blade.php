<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web</title>
</head>
<body>
    @vite(['resources/css/app.css', 'resources/js/blade_app.ts'])
    <h1>Web</h1>

    <div id="vue-simple-counter-container" class="container mx-auto mt-8 p-4">
        <h2>Contador Vue en Blade:</h2>
        <div data-vue-component="simple-counter"></div>
    </div>

    <hr class="my-8">

    <div class="container mx-auto p-4">
        <p>Más contenido Blade aquí...</p>
    </div>
    
    
</body>
</html>