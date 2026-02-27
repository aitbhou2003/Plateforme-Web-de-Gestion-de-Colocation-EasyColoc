<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Colocation - EasyColoc</title>
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
        }

        .stat-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 0.75rem;
            padding: 1.5rem;
        }

        .badge {
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-success {
            background: rgba(16, 185, 129, 0.1);
            color: var(--accent);
        }

        .badge-owner {
            background: rgba(245, 158, 11, 0.1);
            color: #f59e0b;
        }

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
        <nav style="flex: 1; padding: 1rem; overflow-y: auto;">
            <a href="{{ route('dashboard') }}" class="nav-item">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                </svg>
                <span>Dashboard</span>
            </a>

            @if (Auth::user()->check_collocation())
                <a href="{{ route('collocation.create') }}" class="nav-item" style="color: var(--accent);">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Nouvelle Colocation</span>
                </a>
            @endif

            <div style="margin-top: 1rem; border-top: 1px solid var(--border); padding-top: 1rem;">
                <a href="{{ route('collocation.index') }}" class="nav-item active">
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
                    <span>Dépenses</span>
                </a>
                <a href="#" class="nav-item">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span>Balances</span>
                </a>
            </div>
        </nav>

        <!-- User Section -->
        <div style="padding: 1rem; border-top: 1px solid var(--border); background: rgba(0,0,0,0.1);">
            <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.5rem;">
                <div
                    style="width: 40px; height: 40px; border-radius: 50%; background: linear-gradient(to bottom right, #10b981, #059669); display: flex; align-items: center; justify-content: center; font-weight: bold; text-transform: uppercase;">
                    {{ Auth::user()->firstname[0] ?? 'U' }}{{ Auth::user()->lastname[0] ?? '' }}
                </div>
                <div style="flex: 1;">
                    <p class="font-medium text-white text-sm">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                    </p>
                    <p class="text-xs" style="color: var(--muted);">
                        @if (isset($collocation) && Auth::user()->isOwnerOf($collocation))
                            Owner
                        @elseif(isset($collocation))
                            Membre
                        @else
                            Pas de collocation
                        @endif
                    </p>
                </div>
            </div>
            <a href="{{ route('profile.edit') }}" class="profile-btn">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span>Profile</span>
            </a>
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
=        @if (session('success'))
            <div
                style="background: rgba(16, 185, 129, 0.1); border: 1px solid #10b981; color: #10b981; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem;">
                {{ session('success') }}
            </div>
        @endif

        @if (session('warning'))
            <div
                style="background: rgba(245, 158, 11, 0.1); border: 1px solid #f59e0b; color: #f59e0b; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem;">
                {{ session('warning') }}
            </div>
        @endif

        <!-- Flash Messages -->
        @if (session('success'))
            <div
                style="background: rgba(16, 185, 129, 0.1); border: 1px solid var(--accent); color: var(--accent); padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem;">
                {{ session('success') }}
            </div>
        @endif

        @if (session('warning'))
            <div
                style="background: rgba(245, 158, 11, 0.1); border: 1px solid #f59e0b; color: #f59e0b; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem;">
                {{ session('warning') }}
            </div>
        @endif

        <header style="margin-bottom: 2rem;">
            <h1 class="font-display text-3xl font-bold">Ma Colocation</h1>
            <p style="color: var(--muted);">Informations et membres</p>
        </header>

        <!-- Colocation Info -->
        <div class="stat-card" style="margin-bottom: 2rem;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                <div>
                    <h2 class="font-display text-xl font-bold">{{ $collocation->titre }}</h2>
                    <p class="text-sm" style="color: var(--muted);">Créée le
                        {{ $collocation->created_at->format('d F Y') }}</p>
                </div>
                <span class="badge badge-success">{{ $collocation->statue ? 'Active' : 'Inactive' }}</span>
            </div>
            <div style="border-top: 1px solid var(--border); padding-top: 1rem;">
                <p class="text-sm" style="color: var(--muted); margin-bottom: 0.5rem;">Description</p>
                <p class="text-white">{{ $collocation->description ?? 'Aucune description' }}</p>
            </div>
        </div>

        <!-- Members Grid -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
            <h3 class="font-display text-lg font-semibold">Membres ({{ $collocation->users->count() }})</h3>
            <button class="btn-primary" style="font-size: 0.875rem; padding: 0.5rem 1rem;">
                + Inviter
            </button>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1rem;">
            @forelse($collocation->users as $member)
                <div class="glass-card" style="padding: 1rem; display: flex; align-items: center; gap: 1rem;">
                    <div
                        style="width: 48px; height: 48px; border-radius: 50%; background: linear-gradient(to bottom right, 
                        {{ $member->pivot->is_owner ? '#f59e0b, #d97706' : '#10b981, #059669' }}); 
                        display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 1.1rem;">
                        {{ strtoupper(substr($member->firstname, 0, 1)) }}{{ strtoupper(substr($member->lastname, 0, 1)) }}
                    </div>
                    <div style="flex: 1;">
                        <p class="font-medium text-white">{{ $member->firstname }} {{ $member->lastname }}</p>
                        <p class="text-xs"
                            style="color: {{ $member->pivot->is_owner ? '#f59e0b' : 'var(--muted)' }};">
                            {{ $member->pivot->is_owner ? '👑 Propriétaire' : 'Membre' }}
                        </p>
                        <p class="text-xs" style="color: var(--muted);">{{ $member->email }}</p>
                    </div>
                    @if ($member->pivot->is_owner)
                        <span class="badge badge-owner">Owner</span>
                    @else
                        <span class="badge badge-success">Membre</span>
                    @endif
                </div>
            @empty
                <div class="glass-card" style="padding: 2rem; text-align: center; color: var(--muted);">
                    Aucun membre trouvé
                </div>
            @endforelse
        </div>
    </main>
</body>

</html>
