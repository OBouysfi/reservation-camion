<section>
    <!-- En-tête de section -->
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informations du Profil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Mettez à jour les informations de profil et l'adresse email de votre compte.") }}
        </p>
    </header>

    <!-- Formulaire de vérification d'email (caché) -->
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <!-- Formulaire principal -->
    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data" id="profile-form">
        @csrf
        @method('patch')

        <!-- Photo de profil -->
        <div class="flex flex-col items-center mb-6">
            <div class="relative mb-3">
                <img src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : 'https://avatar.iran.liara.run/public/9' }}"
                    id="profileImagePreview"
                    class="h-48 w-48 rounded-full object-cover border border-gray-200 shadow-sm">

                <button type="button" onclick="document.getElementById('profileImage').click();"
                    class="absolute bottom-0 right-4 bg-gray-500 !rounded-full p-2 shadow-md hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        style="fill: #fff;transform: ;msFilter:;">
                        <path d="M19 11h-6V5h-2v6H5v2h6v6h2v-6h6z"></path>
                    </svg>
                </button>
                <input type="file" id="profileImage" name="profile_photo" accept="image/*" class="d-none"
                    onchange="uploadProfileImage(this)">
            </div>
            <p class="text-xs text-gray-500">{{ __('Cliquez sur l\'icône appareil photo pour changer votre photo de profil') }}</p>
            <x-input-error class="mt-2" :messages="$errors->get('profile_image')" />
        </div>

        <!-- Champ Nom -->
        <div>
            <x-input-label for="name" :value="__('Nom')" />
            <x-text-input id="name" name="name" type="text"
                class="mt-1 block border-[1px] border-gray-200 w-full p-2 shadow-none" :value="old('name', $user->name)" required
                autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Champ Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email"
                class="mt-1 block border-[1px] border-gray-200 w-full p-2 shadow-none" :value="old('email', $user->email)" required
                autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            <!-- Vérification email -->
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Votre adresse email n\'est pas vérifiée.') }}

                        <button form="send-verification" id="resend-verification"
                            class="underline text-sm text-gray-800 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Cliquez ici pour renvoyer l\'email de vérification.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('Un nouveau lien de vérification a été envoyé à votre adresse email.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Bouton de soumission -->
        <div class="flex items-end !justify-end gap-4">
            <x-primary-button type="button" id="save-profile-btn" class="!rounded-lg !border-none">{{ __('Enregistrer') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Enregistré.') }}</p>
            @endif
        </div>
    </form>

    <!-- Inclusion de SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.12/sweetalert2.all.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.12/sweetalert2.min.css" rel="stylesheet">

    <!-- Script pour la gestion des interactions -->
    <script>
        // Pour l'upload de la photo de profil
        function uploadProfileImage(input) {
            if (input.files && input.files[0]) {
                // Prévisualisation de l'image
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profileImagePreview').src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
                
                // Afficher SweetAlert pour confirmer le téléchargement
                Swal.fire({
                    title: 'Photo sélectionnée',
                    text: 'Voulez-vous télécharger cette photo de profil?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Oui, télécharger',
                    cancelButtonText: 'Annuler',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Soumettre le formulaire
                        document.getElementById('profile-form').submit();
                    }
                });
            }
        }

        // Pour la soumission du formulaire
        document.getElementById('save-profile-btn').addEventListener('click', function() {
            Swal.fire({
                title: 'Enregistrer les modifications?',
                text: 'Vos informations de profil seront mises à jour',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Enregistrer',
                cancelButtonText: 'Annuler',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('profile-form').submit();
                }
            });
        });

        // Pour l'email de vérification
        const resendBtn = document.getElementById('resend-verification');
        if (resendBtn) {
            resendBtn.addEventListener('click', function(event) {
                event.preventDefault();
                
                Swal.fire({
                    title: 'Renvoyer l\'email de vérification?',
                    text: 'Un nouveau lien de vérification sera envoyé à votre adresse email',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Envoyer',
                    cancelButtonText: 'Annuler',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('send-verification').submit();
                        
                        Swal.fire({
                            title: 'Email envoyé!',
                            text: 'Un nouveau lien de vérification a été envoyé à votre adresse email',
                            icon: 'success',
                            timer: 3000,
                            timerProgressBar: true
                        });
                    }
                });
            });
        }

        // Afficher une notification si le profil a été mis à jour avec succès
        @if (session('status') === 'profile-updated')
            Swal.fire({
                title: 'Profil mis à jour!',
                text: 'Vos informations ont été enregistrées avec succès',
                icon: 'success',
                timer: 2000,
               
                showConfirmButton: false
            });
        @endif

        // Afficher une notification si le lien de vérification a été envoyé
        @if (session('status') === 'verification-link-sent')
            Swal.fire({
                title: 'Email envoyé!',
                text: 'Un nouveau lien de vérification a été envoyé à votre adresse email',
                icon: 'success',
                timer: 3000,
                timerProgressBar: true
            });
        @endif
    </script>
</section>