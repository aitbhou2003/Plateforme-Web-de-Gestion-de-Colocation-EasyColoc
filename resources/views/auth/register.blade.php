<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name Fields Grid -->
        <div class="grid grid-cols-2 gap-4 mb-5">
            <!-- Firstname -->
            <div>
                <label class="form-label" for="firstname">{{ __('First name') }}</label>
                <input id="firstname" class="form-input" type="text" name="firstname" :value="old('firstname')" required autofocus autocomplete="name" placeholder="Jean" />
                <x-input-error :messages="$errors->get('firstname')" class="mt-2 text-red-400 text-xs" />
            </div>

            <!-- Lastname -->
            <div>
                <label class="form-label" for="lastname">{{ __('Last name') }}</label>
                <input id="lastname" class="form-input" type="text" name="lastname" :value="old('lastname')" required autocomplete="lastname" placeholder="Dupont" />
                <x-input-error :messages="$errors->get('lastname')" class="mt-2 text-red-400 text-xs" />
            </div>
        </div>

        <!-- Email Address -->
        <div class="mb-5">
            <label class="form-label" for="email">{{ __('Email') }}</label>
            <input id="email" class="form-input" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="votre@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400 text-xs" />
        </div>

        <!-- Password -->
        <div class="mb-5">
            <label class="form-label" for="password">{{ __('Password') }}</label>
            <input id="password" class="form-input" type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400 text-xs" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-5">
            <label class="form-label" for="password_confirmation">{{ __('Confirm Password') }}</label>
            <input id="password_confirmation" class="form-input" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-400 text-xs" />
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-end mt-6">
            <a class="text-sm text-muted hover:underline me-4" style="color: #6b7280;" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <button type="submit" class="btn-primary" style="width: auto; padding-left: 2rem; padding-right: 2rem;">
                {{ __('Register') }}
            </button>
        </div>
    </form>
</x-guest-layout>