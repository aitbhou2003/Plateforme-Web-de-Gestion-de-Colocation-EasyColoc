<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catégories - EasyColoc</title>
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
            --danger: #ef4444;
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

        .nav-item.active {
            background: rgba(16, 185, 129, 0.1);
            color: var(--accent);
        }

        .glass-card {
            background: rgba(26, 35, 50, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid var(--border);
            border-radius: 1rem;
            padding: 1.5rem;
            margin-bottom: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-primary {
            background: var(--accent);
            color: #000;
            font-weight: 600;
            padding: 0.65rem 1.5rem;
            border-radius: 0.5rem;
            border: none;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .btn-danger {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger);
            border: 1px solid var(--danger);
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
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

        .badge {
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            background: rgba(16, 185, 129, 0.1);
            color: var(--accent);
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div style="padding: 1.5rem; border-bottom: 1px solid var(--border);">
            <span class="font-display text-xl font-bold text-white">EasyColoc</span>
        </div>
        <nav style="flex: 1; padding: 1rem;">
            <a href="{{ route('dashboard') }}" class="nav-item">Dashboard</a>
            <a href="{{ route('collocation.index') }}" class="nav-item">Ma Colocation</a>
            <a href="{{ route('categories.index') }}" class="nav-item active">Catégories</a>
            {{-- <a href="{{ route('depenses.index') }}" class="nav-item">Dépenses</a> --}}
        </nav>
        <div style="padding: 1rem; border-top: 1px solid var(--border);">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-item" style="color: var(--danger);">Logout</button>
            </form>
        </div>
    </aside>

    <main class="main-content">
        @if (session('success'))
            <div
                style="background: rgba(16, 185, 129, 0.1); border: 1px solid var(--accent); color: var(--accent); padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem;">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div
                style="background: rgba(239, 68, 68, 0.1); border: 1px solid var(--danger); color: var(--danger); padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem;">
                {{ session('error') }}
            </div>
        @endif

        <header style="margin-bottom: 2rem; display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h1 class="font-display text-3xl font-bold">Catégories</h1>
                <p style="color: var(--muted);">
                    @if ($isOwner)
                        Gérez les catégories de dépenses pour votre collocation
                    @else
                        Catégories disponibles pour vos dépenses
                    @endif
                </p>
            </div>
            @if ($isOwner)
                <a href="{{ route('categories.create') }}" class="btn-primary">+ Nouvelle Catégorie</a>
            @endif
        </header>

        

        @forelse($categories as $categorie)
            <div class="glass-card">
                <div>
                    <h3 class="font-display text-lg font-bold">{{ $categorie->name }}</h3>
                    <p style="color: var(--muted); font-size: 0.875rem; margin-top: 0.25rem;">
                        {{ $categorie->depenses->count() }} dépense(s)
                    </p>
                </div>

                @if ($isOwner)
                    <form action="{{ route('categories.destroy', $categorie) }}" method="POST"
                        onsubmit="return confirm('Supprimer cette catégorie ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-danger">Supprimer</button>
                    </form>
                @else
                    <span class="badge">Utilisable</span>
                @endif
            </div>
        @empty
            <div class="glass-card" style="text-align: center; padding: 3rem;">
                <p style="color: var(--muted); margin-bottom: 1rem;">Aucune catégorie créée</p>
                @if ($isOwner)
                    <p style="color: var(--muted); font-size: 0.875rem; margin-bottom: 1rem;">Créez des catégories pour
                        organiser les dépenses</p>
                    <a href="{{ route('categories.create') }}" class="btn-primary">Créer une catégorie</a>
                @else
                    <p style="color: var(--muted); font-size: 0.875rem;">Le propriétaire doit créer des catégories</p>
                @endif
            </div>
        @endforelse
    </main>
</body>

</html>
