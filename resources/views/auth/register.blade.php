<x-guest-layout>
    <div class="mb-6 text-center">
        <h1 class="text-3xl font-bold text-emerald-600">Criar uma conta</h1>
        <p class="text-sm text-gray-500 mt-1">Preencha os campos abaixo para se registrar</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nome')" class="text-gray-700" />
            <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-emerald-500 focus:border-emerald-500" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-500" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('E-mail')" class="text-gray-700" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-emerald-500 focus:border-emerald-500" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Senha')" class="text-gray-700" />
            <x-text-input id="password" type="password" name="password" required autocomplete="new-password"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-emerald-500 focus:border-emerald-500" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-500" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirmar Senha')" class="text-gray-700" />
            <x-text-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-emerald-500 focus:border-emerald-500" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-500" />
        </div>

        <!-- Ação -->
        <div class="flex items-center justify-between mt-6">
            <a class="text-sm text-emerald-600 hover:underline" href="{{ route('login') }}">
                Já possui uma conta?
            </a>

            <x-primary-button class="bg-emerald-600 hover:bg-emerald-700 focus:ring-emerald-500">
                {{ __('Cadastrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
