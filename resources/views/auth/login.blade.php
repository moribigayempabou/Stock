<x-guest-layout>
    <!-- Conteneur principal avec une bordure noire -->
    <div class="w-full max-w-sm border border-black rounded-lg p-4">
        <!-- Logo -->
        <div class="flex justify-center p-4 bg-blue-500 rounded-full">
            <img src="{{ asset('dist/img/UJKZ.png') }}" alt="UJKZ" height="100" width="100">
        </div>

        <!-- Titre -->
        <div class="text-center mt-4 text-2xl"><strong>
           Bienvenue sur la plateforme de gestion de stock de matériel!<!-- Utilisez la classe text-2xl pour agrandir le texte -->
        </strong></div>
        <div class="text-center mt-4 text-2xl" style="color: #3498db;"><strong>
            Veuillez-vous connecter !
        </strong></div>


        <!-- Formulaire de connexion -->
        <form class="mt-5 bg-white shadow-md rounded-lg px-2 py-5" method="POST" action="{{ route('login') }}">
            @csrf

            @if(session('error'))
            <div class="alert alert-danger">
                <span class="invalid-feedback" role="alert" style="color: red;">
                    <strong> {{ session('error') }}</strong>
                </span>

            </div>
        @endif


            <!-- Champ Email Address -->
            <div class="mb-2">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                @error('email')
                <span class="invalid-feedback" role="alert" style="color: red;">
                    <strong>{{ $errors }}</strong>
                </span>
                @enderror
            </div>

            <!-- Champ Password -->
            <div class="mb-2">
                <x-input-label for="password" :value="__('Mot de passe')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                @error('password')
                <span class="invalid-feedback" role="alert" style="color: red;">
                    <strong>{{ $errors }}</strong>
                </span>
                @enderror
            </div>

            <!-- Case à cocher "Remember Me" -->
            <div class="mb-2">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Souvenir de moi') }}</span>
                </label>
            </div>

            <!-- Liens "Mot de passe oublié ?" et Bouton "Connexion" -->
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié ?') }}
                    </a>
                @endif
                <button type="submit" class="btn"> {{ __('Connexion') }}</button>
            </div>
        </form>
    </div>
</x-guest-layout>
