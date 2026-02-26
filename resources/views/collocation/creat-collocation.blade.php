<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle Colocation - EasyColoc</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    <style>
        /* Theme Variables */
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

        /* Layout */
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

        /* Sidebar Nav Items */
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

        /* Cards & Components */
        .glass-card {
            background: rgba(26, 35, 50, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid var(--border);
            border-radius: 1rem;
            padding: 1.5rem;
        }

        /* Form Inputs */
        .form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 0.5rem;
            color: white;
            font-size: 0.875rem;
            transition: border 0.2s;
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

        /* Buttons */
        .btn-primary {
            background: var(--accent);
            color: #000;
            font-weight: 600;
            padding: 0.65rem 1.5rem;
            border-radius: 0.5rem;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary:hover {
            opacity: 0.9;
        }

        .btn-secondary {
            background: var(--card);
            border: 1px solid var(--border);
            color: white;
            font-weight: 500;
            padding: 0.65rem 1.5rem;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.05);
        }

        /* Profile Button Style */
        .profile-btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            width: 100%;
            padding: 0.5rem 0.75rem;
            font-size: 0.875rem;
            border-radius: 0.5rem;
            transition: all 0.2s;
            text-decoration: none;
            background: none;
            border: none;
            cursor: pointer;
            color: #9ca3af;
        }

        .profile-btn:hover {
            background: rgba(255, 255, 255, 0.05);
            color: white;
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <!-- Logo -->
        <div style="padding: 1.5rem; border-bottom: 1px solid var(--border);">
            <a href="{{ route('dashboard') }}"
                style="display: flex; align-items: center; gap: 0.75rem; text-decoration: none;">
                <div
                    style="width: 40px; height: 40px; background: rgba(16,185,129,0.1); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        style="color: var(--accent);">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                </div>
                <span class="font-display text-xl font-bold text-white">EasyColoc</span>
            </a>
        </div>

        <!-- Navigation Links -->
        <nav style="flex: 1; padding: 1rem; overflow-y: auto;">

            <!-- 1. Dashboard -->
            <a href="{{ route('dashboard') }}" class="nav-item">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                </svg>
                <span>Dashboard</span>
            </a>

            <!-- 2. Nouvelle Colocation (Active) -->
             @if (Auth::user()->check_collocation())
                <a href="#" class="nav-item" style="color: var(--accent);"><svg class="w-5 h-5" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg><span>Nouvelle Colocation</span></a>
            @endif

            <div style="margin-top: 1rem; border-top: 1px solid var(--border); padding-top: 1rem;">
                <a href="{{ route('collocation.index') }}" class="nav-item">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    <span>Ma Colocation</span>
                </a>
                <a href="#" class="nav-item">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                    <span>Depenses</span>
                </a>
                <a href="#" class="nav-item">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span>Balances</span>
                </a>
            </div>

            <!-- Admin Section -->
            <div style="margin-top: 1.5rem; padding-top: 1rem; border-top: 1px solid var(--border);">
                <p class="text-xs font-medium uppercase tracking-wider mb-2 px-3" style="color: var(--muted);">Admin</p>
                <a href="#" class="nav-item">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>Admin Global</span>
                </a>
            </div>
        </nav>

        <!-- User Info, Profile & Logout -->
        <div style="padding: 1rem; border-top: 1px solid var(--border); background: rgba(0,0,0,0.1);">
            <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.5rem;">
                <div
                    style="width: 40px; height: 40px; border-radius: 50%; background: linear-gradient(to bottom right, #10b981, #059669); display: flex; align-items: center; justify-content: center; font-weight: bold; text-transform: uppercase;">
                    {{ Auth::user()->firstname[0] ?? 'U' }}{{ Auth::user()->lastname[0] ?? '' }}
                </div>
                <div style="flex: 1;">
                    <p class="font-medium text-white text-sm">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                    </p>
                    <p class="text-xs" style="color: var(--muted);">Owner</p>
                </div>
            </div>

            <!-- Profile Link -->
            <a href="{{ route('profile.edit') }}" class="profile-btn">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span>Profile</span>
            </a>

            <!-- Logout Form -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="profile-btn" style="color: #ef4444;">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <header style="margin-bottom: 2rem;">
            <h1 class="font-display text-3xl font-bold">Creer une colocation</h1>
            <p style="color: var(--muted);">Remplissez les informations ci-dessous pour demarrer une nouvelle
                colocation</p>
        </header>

        <!-- Form Container -->
        <div class="glass-card" style="max-width: 900px;">
            <form action="{{ route('collocation.store') }}" method="POST" style="display: grid; gap: 1.5rem;">
                @csrf

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                    <div>
                        <label class="form-label">Titre de la colocation</label>
                        <input type="text" name="titre" class="form-input"
                            placeholder="Ex: Appartement Paris 11e" required>
                    </div>
                    
                </div>

                {{-- <div>
                    <label class="form-label">Adresse complete</label>
                    <select name="address" class="form-input" required>
                        <option value="" disabled selected>Selectionnez une adresse</option>
                        <option value="42 rue de la Roquette, 75011 Paris">42 rue de la Roquette, 75011 Paris</option>
                        <option value="15 avenue des Champs-Élysées, 75008 Paris">15 avenue des Champs-Élysées, 75008
                            Paris</option>
                        <option value="8 rue de la République, 69002 Lyon">8 rue de la République, 69002 Lyon</option>
                        <option value="25 cours Mirabeau, 13100 Aix-en-Provence">25 cours Mirabeau, 13100
                            Aix-en-Provence</option>
                        <option value="other">Autre (Non listee)</option>
                    </select>
                </div>   --}}

                <div>
                    <label class="form-label">Informations supplementaires</label>
                    <textarea name="description" rows="4" class="form-input" style="resize: vertical;"
                        placeholder="Details sur l'appartement, code d'entree, regles interieures..."></textarea>
                </div>

                <div style="display: flex; gap: 1rem; margin-top: 1rem;">
                    <a href="{{ route('dashboard') }}" class="btn-secondary">
                        Annuler
                    </a>
                    <button type="submit" class="btn-primary">
                        Creer la colocation
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
