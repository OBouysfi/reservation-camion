<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

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
                    onchange="this.form.submit()">
            </div>
            <p class="text-xs text-gray-500">{{ __('Click the camera icon to change your profile picture') }}</p>
            <x-input-error class="mt-2" :messages="$errors->get('profile_image')" />
        </div>

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text"
                class="mt-1 block border-[1px] border-gray-00 w-full p-2 shadow-none" :value="old('name', $user->name)" required
                autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email"
                class="mt-1 block border-[1px] border-gray-200 w-full p-2 shadow-none" :value="old('email', $user->email)" required
                autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-800 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="w-full !rounded-lg !border-none">{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
    <script>
        document.getElementById('profileImage').addEventListener('change', function() {
            this.form.submit();
        });
    </script>
</section>

<!-- Image Management Section -->
