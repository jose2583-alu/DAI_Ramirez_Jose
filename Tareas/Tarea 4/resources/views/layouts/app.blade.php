<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog de Pesca Deportiva</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 850px; margin: 2rem auto; padding: 0 1.5rem; background: #f8fafc; color: #1e293b; line-height: 1.6; }
        nav { background: #0f172a; padding: 1rem 1.5rem; border-radius: 8px; margin-bottom: 2rem; display: flex; gap: 1.5rem; }
        nav a { color: #38bdf8; text-decoration: none; font-weight: 600; }
        nav a:hover { color: #fff; }
        .card { background: #fff; padding: 1.25rem; border-radius: 8px; border: 1px solid #e2e8f0; margin-bottom: 1rem; box-shadow: 0 1px 2px rgba(0,0,0,0.05); }
        .btn { display: inline-block; background: #0284c7; color: #fff; padding: 0.5rem 1rem; border-radius: 6px; text-decoration: none; border: none; cursor: pointer; font-weight: 600; font-size: 0.95rem; }
        .btn:hover { background: #0369a1; }
        .alert-success { background: #dcfce7; color: #166534; padding: 0.75rem 1rem; border-radius: 6px; border: 1px solid #bbf7d0; margin-bottom: 1rem; font-weight: 600; }
        .alert-error { background: #fee2e2; color: #991b1b; padding: 0.75rem 1rem; border-radius: 6px; border: 1px solid #fecaca; margin-bottom: 1rem; }
        input[type="text"], input[type="email"], input[type="color"], textarea { width: 100%; padding: 0.5rem; border: 1px solid #cbd5e1; border-radius: 6px; margin-top: 0.25rem; box-sizing: border-box; font-family: inherit; }
        input[type="color"] { height: 42px; padding: 0.2rem; }
        .form-group { margin-bottom: 1rem; }
        label { font-weight: 600; font-size: 0.9rem; }
        .badge { display: inline-block; padding: 0.2rem 0.6rem; border-radius: 999px; color: #fff; font-size: 0.85rem; font-weight: bold; }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('posts.index') }}">Posts</a>
        <a href="{{ route('categorias.index') }}">Categorías</a>
        <a href="{{ route('etiquetas.index') }}">Etiquetas</a>
        <a href="{{ route('contacto.index') }}">Contacto</a>
    </nav>

    <main>
        @yield('content')
    </main>
</body>
</html>