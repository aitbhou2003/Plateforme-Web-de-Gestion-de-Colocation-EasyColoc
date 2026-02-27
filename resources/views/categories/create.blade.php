<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle Catégorie - EasyColoc</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --bg: #0a0f1a;
            --surface: #111827;
            --card: #1a2332;
            --border: #2d3a4f;
            --accent: #10b981;
            --muted: #6b7280;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg);
            color: #f3f4f6;
            margin: 0;
        }

        .font-display {
            font-family: 'Space Grotesk', sans-serif;
        }

        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: var(--surface);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            z-index: 50;
        }

        .main-content {
            margin-left: 260px;
            min-height: 100vh;
            padding: 2rem;
            background: radial-gradient(ellipse at top, rgba(16, 185, 129, 0.05), transparent 70%);
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            color: #9ca3af;
            text-decoration: none;
            border-radius: 0.5rem;
            margin-bottom: 0.25rem;
            transition: all 0.2s;
        }

        .nav-item:hover {
            background: rgba(255, 255, 255, 0.05);
            color: white;
        }

        .glass-card {
            background: rgba(26, 35, 50, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid var(--border);
            border-radius: 1rem;
            padding: 1.5rem;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 0.5rem;
            color: white;
            font-size: 0.875rem;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--accent);
        }

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: #d1d5db;
        }

        .btn-primary {
            background: var(--accent);
            color: #000;
            font-weight: 600;
            padding: 0.65rem 1.5rem;
            border-radius: 0.5rem;
            border: none;
            cursor: pointer;
        }

        .btn-secondary {
            background: var(--card);
            border: 1px solid var(--border);
            color: white;
            font-weight: 500;
            padding: 0.65rem 1.5rem;
            border-radius: 0.5rem;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
    </style>
</head>

<body>

    <aside class="sidebar">
        <div style="padding: 1.5rem; border-bottom: 1px solid var(--border);">
            <span class="font-display text-xl font-bold text-white">EasyColoc</span>
        </div>
        <nav style="flex: 1; padding: 1rem;">
            <a href="{{ route('dashboard') }}" class="nav-item">Dashboard</a>
            <a href="{{ route('collocation.index') }}" class="nav-item">Ma Colocation</a>
            <a href="{{ route('categories.index') }}" class="nav-item">Catégories</a>
            {{-- <a href="{{ route('depenses.index') }}" class="nav-item">Dépenses</a> --}}
        </nav>
    </aside>

    <main class="main-content">
        <header style="margin-bottom: 2rem;">
            <h1 class="font-display text-3xl font-bold">Nouvelle Catégorie</h1>
            <p style="color: var(--muted);">Créez une catégorie pour organiser les dépenses</p>
        </header>

        <div class="glass-card" style="max-width: 500px;">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf

                <div style="margin-bottom: 1.5rem;">
                    <label class="form-label">Nom de la catégorie</label>
                    <input type="text" name="name" class="form-input"
                        placeholder="Ex: Courses, Loyer, Internet..." required autofocus>
                    @error('name')
                        <p style="color: #ef4444; font-size: 0.875rem; margin-top: 0.5rem;">{{ $message }}</p>
                    @enderror
                </div>

                <div style="display: flex; gap: 1rem;">
                    <a href="{{ route('categories.index') }}" class="btn-secondary">Annuler</a>
                    <button type="submit" class="btn-primary">Créer la catégorie</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
