<x-guest-layout>
    <div class="mb-6 text-center">
        <h1 class="text-3xl font-bold text-emerald-600">Bem-vindo de volta</h1>
        <p class="text-sm text-gray-500 mt-1">Acesse sua conta para continuar</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('E-mail')" class="text-gray-700" />
            <x-text-input id="email"
                          type="email"
                          name="email"
                          :value="old('email')"
                          required
                          autofocus
                          autocomplete="username"
                          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-emerald-500 focus:border-emerald-500" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Senha')" class="text-gray-700" />
            <x-text-input id="password"
                          type="password"
                          name="password"
                          required
                          autocomplete="current-password"
                          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-emerald-500 focus:border-emerald-500" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-500" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" name="remember"
                       class="rounded border-gray-300 text-emerald-600 shadow-sm focus:ring-emerald-500">
                <span class="ms-2 text-sm text-gray-600">{{ __('Lembrar-me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-emerald-600 hover:underline" href="{{ route('password.request') }}">
                    {{ __('Esqueceu sua senha?') }}
                </a>
            @endif
        </div>

        <div>
            <x-primary-button class="w-full justify-center bg-emerald-600 hover:bg-emerald-700 focus:ring-emerald-500">
                {{ __('Entrar') }}
            </x-primary-button>
        </div>
    </form>

    <p class="mt-6 text-center text-sm text-gray-600">
        Não tem uma conta?
        <a href="{{ route('register') }}" class="text-emerald-600 hover:underline font-medium">Cadastre-se</a>
    </p>
</x-guest-layout>
