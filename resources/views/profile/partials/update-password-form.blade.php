<section class="p-4">
    <!-- En-tête de section -->
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Mise à jour du mot de passe') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Assurez-vous que votre compte utilise un mot de passe long et aléatoire pour rester sécurisé.') }}
        </p>
    </header>

    <!-- Formulaire de mise à jour -->
    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <!-- Mot de passe actuel -->
        <div>
            <x-input-label for="update_password_current_password" :value="__('Mot de passe actuel')" />
            <x-text-input id="update_password_current_password" 
                         name="current_password" 
                         type="password" 
                         class="mt-1 block border-[1px] border-gray-200 w-full p-2 shadow-none" 
                         autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <!-- Nouveau mot de passe -->
        <div>
            <x-input-label for="update_password_password" :value="__('Nouveau mot de passe')" />
            <x-text-input id="update_password_password" 
                         name="password" 
                         type="password" 
                         class="mt-1 block border-[1px] border-gray-200 w-full p-2 shadow-none" 
                         autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <!-- Confirmation du mot de passe -->
        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirmer le mot de passe')" />
            <x-text-input id="update_password_password_confirmation" 
                         name="password_confirmation" 
                         type="password" 
                         class="mt-1 block border-[1px] border-gray-200 w-full p-2 shadow-none" 
                         autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Bouton de soumission -->
        <div class="flex items-center gap-4">
            <x-primary-button class="w-full !rounded-lg !border-none">
                {{ __('Enregistrer') }}
            </x-primary-button>

            <!-- Message de confirmation -->
            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }"
                   x-show="show"
                   x-transition
                   x-init="setTimeout(() => show = false, 2000)"
                   class="text-sm text-gray-600">
                    {{ __('Modifications enregistrées.') }}
                </p>
            @endif
        </div>
    </form>
</section>