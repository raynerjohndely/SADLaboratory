<x-guest-layout>
    <div class="space-y-7">
        <div class="text-center">
            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-indigo-600">Sign In</p>
            <h1 class="mt-2 text-3xl font-bold text-slate-800">Welcome back</h1>
            <p class="mt-2 text-sm text-slate-500">Sign in to continue to your dashboard.</p>
        </div>

        <x-auth-session-status class="rounded-xl border border-emerald-100 bg-emerald-50 px-4 py-3 text-sm text-emerald-700" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div>
                <x-input-label for="email" :value="__('Email Address')" class="mb-1.5 block text-sm font-medium text-slate-700" />
                <x-text-input id="email" class="w-full rounded-xl border-slate-200 px-4 py-3 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="you@example.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="password" :value="__('Password')" class="mb-1.5 block text-sm font-medium text-slate-700" />
                <x-text-input id="password" class="w-full rounded-xl border-slate-200 px-4 py-3 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                              type="password"
                              name="password"
                              required
                              autocomplete="current-password"
                              placeholder="••••••••" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between gap-3">
                <label for="remember_me" class="inline-flex items-center gap-2 text-sm text-slate-600">
                    <input id="remember_me" type="checkbox" class="h-4 w-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500" name="remember">
                    <span>{{ __('Remember me') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-sm font-medium text-indigo-600 transition hover:text-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                @endif
            </div>

            <button type="submit" class="w-full rounded-xl bg-indigo-600 px-4 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-300/50 transition hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                {{ __('Sign In') }}
            </button>

            <div class="rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-center text-sm text-slate-600">
                @if (Route::has('register'))
                    {{ __('No account yet?') }}
                    <a href="{{ route('register') }}" class="font-semibold text-indigo-600 transition hover:text-indigo-500">{{ __('Create one') }}</a>
                @endif
            </div>
        </form>
    </div>
</x-guest-layout>
