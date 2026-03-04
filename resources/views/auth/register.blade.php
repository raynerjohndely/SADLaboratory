<x-guest-layout>
    <div class="space-y-7">
        <div class="text-center">
            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-indigo-600">Create Account</p>
            <h1 class="mt-2 text-3xl font-bold text-slate-800">Create your account</h1>
            <p class="mt-2 text-sm text-slate-500">Join now and start using the platform.</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <div>
                <x-input-label for="name" :value="__('Full Name')" class="mb-1.5 block text-sm font-medium text-slate-700" />
                <x-text-input id="name" class="w-full rounded-xl border-slate-200 px-4 py-3 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Juan Dela Cruz" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="email" :value="__('Email Address')" class="mb-1.5 block text-sm font-medium text-slate-700" />
                <x-text-input id="email" class="w-full rounded-xl border-slate-200 px-4 py-3 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="you@example.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="password" :value="__('Password')" class="mb-1.5 block text-sm font-medium text-slate-700" />
                <x-text-input id="password" class="w-full rounded-xl border-slate-200 px-4 py-3 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                              type="password"
                              name="password"
                              required
                              autocomplete="new-password"
                              placeholder="At least 8 characters" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="mb-1.5 block text-sm font-medium text-slate-700" />
                <x-text-input id="password_confirmation" class="w-full rounded-xl border-slate-200 px-4 py-3 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                              type="password"
                              name="password_confirmation"
                              required
                              autocomplete="new-password"
                              placeholder="Re-enter your password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <button type="submit" class="w-full rounded-xl bg-indigo-600 px-4 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-300/50 transition hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                {{ __('Create Account') }}
            </button>

            <div class="rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-center text-sm text-slate-600">
                {{ __('Already have an account?') }}
                <a href="{{ route('login') }}" class="font-semibold text-indigo-600 transition hover:text-indigo-500">{{ __('Sign in') }}</a>
            </div>
        </form>
    </div>
</x-guest-layout>
