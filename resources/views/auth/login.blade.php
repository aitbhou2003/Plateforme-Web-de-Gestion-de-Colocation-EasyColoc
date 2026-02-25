<x-guest-layout>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-5">
            <label class="form-label" for="email">{{ __('Email') }}</label>
            <input id="email" class="form-input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="votre@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400 text-xs" />
        </div>

        <!-- Password -->
        <div class="mb-5">
            <label class="form-label" for="password">{{ __('Password') }}</label>
            <input id="password" class="form-input" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400 text-xs" />
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between mb-6">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" class="rounded border-gray-700 bg-surface text-accent focus:ring-accent" name="remember" style="accent-color: #10b981;">
                <span class="ms-2 text-sm text-muted">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm hover:underline" style="color: #10b981;" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn-primary">
            {{ __('Log in') }}
        </button>

        <!-- Register Link -->
        <div class="mt-6 text-center">
            <p class="text-muted text-sm" style="color: #6b7280;">
                Pas encore de compte ? 
                <a href="{{ route('register') }}" class="font-medium hover:underline" style="color: #10b981;">S'inscrire</a>
            </p>
        </div>
    </form>
</x-guest-layout>