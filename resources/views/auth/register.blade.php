<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
            <!-- contact number -->
            <div class="mt-4">
                <x-label for="contact" :value="__('contact')" />

                <x-input id="contact" class="block mt-1 w-full" type="text" name="contact" :value="old('contact')" required />
            </div>
            <!-- city -->
            <div class="mt-4">
                <x-label for="city" :value="__('city')" />

                <x-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required />
            </div>
            <!-- state -->
            <div class="mt-4">
                <x-label for="state" :value="__('state')" />

                <x-input id="state" class="block mt-1 w-full" type="text" name="state" :value="old('state')" required />
            </div>
            <!-- country -->
            <div class="mt-4">
                <x-label for="country" :value="__('country')" />

                <x-input id="country" class="block mt-1 w-full" type="text" name="country" :value="old('country')" required />
            </div>
            <!-- Pincode -->
            <div class="mt-4">
                <x-label for="pin code" :value="__('pincode')" />

                <x-input id="pincode" class="block mt-1 w-full" type="text" name="pincode" :value="old('pincode')" required />
            </div>
            <!-- Image -->
            <div class="mt-4">
                <x-label for="image" :value="__('image')" />

                <x-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
