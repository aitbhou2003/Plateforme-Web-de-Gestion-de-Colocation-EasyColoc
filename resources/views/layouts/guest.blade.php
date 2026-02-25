<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=space-grotesk:400,500,600,700|inter:300,400,500,600" rel="stylesheet" />
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Custom Styles for Dark Theme (Can also go in app.css) -->
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0a0f1a; /* var(--bg) */
            color: #f3f4f6;
        }
        .font-display { font-family: 'Space Grotesk', sans-serif; }
        
        /* Glass Card Effect */
        .auth-card {
            background: rgba(26, 35, 50, 0.7);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(45, 58, 79, 0.5);
            border-radius: 1rem;
            padding: 2rem;
            width: 100%;
            max-width: 420px;
        }

        /* Input Styles */
        .form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            background: #111827; /* var(--surface) */
            border: 1px solid #2d3a4f; /* var(--border) */
            border-radius: 0.75rem;
            color: white;
            font-size: 1rem;
            transition: border-color 0.2s;
        }
        .form-input:focus {
            outline: none;
            border-color: #10b981; /* var(--accent) */
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }

        /* Label Styles */
        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: #d1d5db;
        }

        /* Button Styles */
        .btn-primary {
            width: 100%;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            font-weight: 600;
            padding: 0.75rem 1rem;
            border-radius: 0.75rem;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 20px rgba(16, 185, 129, 0.4);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">
    
    <div class="auth-card">
        <!-- Logo Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-accent/10 mb-4" style="background: rgba(16,185,129,0.1);">
                <svg class="w-8 h-8 text-accent" style="color: #10b981;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
            </div>
            <h1 class="font-display text-3xl font-bold text-white">{{ config('app.name', 'ColocShare') }}</h1>
            <p class="text-muted mt-2" style="color: #6b7280;">Gestion simplifiée de vos colocations</p>
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <!-- Content Yield -->
        {{ $slot }}
    </div>
</body>
</html>