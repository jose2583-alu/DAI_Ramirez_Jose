<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog de Pesca Deportiva</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 800px; margin: 2rem auto; padding: 0 1rem; line-height: 1.5; }
        nav { margin-bottom: 1.5rem; padding-bottom: 0.75rem; border-bottom: 1px solid #ddd; }
        nav a { margin-right: 1rem; text-decoration: none; color: #0284c7; font-weight: bold; }
    </style>
</head>
<body>
    <nav>
        <a href="/posts">Posts</a>
        <a href="{{ route('categorias.index') }}">Categorías</a>
    </nav>

    <main>
        @yield('content')
    </main>
</body>
</html>