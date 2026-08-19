<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Taller 01')</title>
    <style>
        :root { color-scheme: light dark; }
        body { font-family: system-ui, sans-serif; max-width: 720px; margin: 2rem auto; padding: 0 1rem; line-height: 1.5; }
        h1 { margin-bottom: 1.5rem; }
        a { color: #2563eb; }
        .actions { display: flex; gap: .75rem; flex-wrap: wrap; margin: 1rem 0; }
        .btn { display: inline-block; padding: .5rem 1rem; border: 1px solid #2563eb; border-radius: .375rem; background: #2563eb; color: #fff; text-decoration: none; cursor: pointer; font-size: 1rem; }
        .btn--secondary { background: transparent; color: #2563eb; }
        .btn--danger { background: #dc2626; border-color: #dc2626; }
        .field { margin-bottom: 1rem; display: flex; flex-direction: column; gap: .25rem; }
        .field input, .field select { padding: .5rem; font-size: 1rem; }
        .error { color: #dc2626; font-size: .875rem; }
        .alert { padding: .75rem 1rem; border-radius: .375rem; background: #dcfce7; color: #166534; margin-bottom: 1rem; }
        table { border-collapse: collapse; width: 100%; }
        th, td { text-align: left; padding: .5rem; border-bottom: 1px solid #d4d4d8; }
    </style>
</head>
<body>
    <h1>@yield('title', 'Taller 01')</h1>

    @if (session('status'))
        <p class="alert">{{ session('status') }}</p>
    @endif

    @yield('content')
</body>
</html>
