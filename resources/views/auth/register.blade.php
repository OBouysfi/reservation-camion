<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="flex justify-center items-center flex-col py-10">
            <img src="/Logo.png" alt="">
            <h1 class="text-xl font-bold">register to your Account</h1>
            <p class="text-sm font-light text-gray-600">Welcome back, please enter your details.</p>
        </div>
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" placeholder="John Doe" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" placeholder="example@email.com" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" placeholder="***********" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password"  />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input placeholder="***********" id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-primary-button class="w-full rounded-sm">
                {{ __('Register') }}
            </x-primary-button>
        </div>

        <div class="flex justify-center items-center my-6">
            <p class="text-sm">Already have an account? </p>
            <a class="text-sm font-semibold text-primary hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Sign In') }}
            </a>
        </div>
    </form>
</x-guest-layout>
