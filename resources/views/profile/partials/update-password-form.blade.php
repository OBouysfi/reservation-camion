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
    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6" id="password-update-form">
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
        <div class="flex items-center !justify-end gap-4">
            <x-primary-button type="button" id="update-password-btn" class="!rounded-lg !border-none">
                {{ __('Enregistrer') }}
            </x-primary-button>

            <!-- Message de confirmation (gardé pour compatibilité) -->
            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }"
                   x-show="show"
                   x-transition
                   x-init="setTimeout(() => show = false, 2000)"
                   class="text-sm text-gray-600 hidden">
                    {{ __('Modifications enregistrées.') }}
                </p>
            @endif
        </div>
    </form>

    <!-- Inclusion de SweetAlert (si pas déjà inclus dans la page) -->
    @if(!isset($sweetalertLoaded))
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.12/sweetalert2.all.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.12/sweetalert2.min.css" rel="stylesheet">
    @php($sweetalertLoaded = true)
    @endif

    <!-- Script pour la gestion des interactions -->
    <script>
        // Pour la soumission du formulaire de mot de passe
        document.getElementById('update-password-btn').addEventListener('click', function() {
            // Vérification de base des champs
            const currentPassword = document.getElementById('update_password_current_password').value;
            const newPassword = document.getElementById('update_password_password').value;
            const confirmPassword = document.getElementById('update_password_password_confirmation').value;
            
            if (!currentPassword || !newPassword || !confirmPassword) {
                Swal.fire({
                    title: 'Champs incomplets',
                    text: 'Veuillez remplir tous les champs de mot de passe',
                    icon: 'warning',
                    confirmButtonColor: '#3085d6'
                });
                return;
            }
            
            if (newPassword !== confirmPassword) {
                Swal.fire({
                    title: 'Mots de passe différents',
                    text: 'Le nouveau mot de passe et sa confirmation ne correspondent pas',
                    icon: 'error',
                    confirmButtonColor: '#3085d6'
                });
                return;
            }
            
            // Si tout est bon, confirmation avant envoi
            Swal.fire({
                title: 'Confirmer la modification',
                text: 'Êtes-vous sûr de vouloir modifier votre mot de passe?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Oui, modifier',
                cancelButtonText: 'Annuler',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Animation de chargement pendant la soumission
                    Swal.fire({
                        title: 'Modification en cours...',
                        text: 'Veuillez patienter pendant la mise à jour de votre mot de passe',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                    
                    // Soumettre le formulaire
                    document.getElementById('password-update-form').submit();
                }
            });
        });

        // Notification si le mot de passe a été mis à jour avec succès
        @if (session('status') === 'password-updated')
            Swal.fire({
                title: 'Mot de passe mis à jour!',
                text: 'Votre mot de passe a été modifié avec succès',
                icon: 'success',
                timer: 3000,
                showConfirmButton: false
            });
        @endif
        
        // Afficher les erreurs si présentes après soumission
        @if ($errors->updatePassword->any())
            Swal.fire({
                title: 'Erreur',
                html: `@foreach ($errors->updatePassword->all() as $error)
                        <p>{{ $error }}</p>
                       @endforeach`,
                icon: 'error',
                confirmButtonColor: '#3085d6'
            });
        @endif
    </script>
</section>