<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-slot name="logo">
                <div class="flex flex-row gap-4">
                <x-authentication-card-logo /> 
                <h1 class='text-3xl font-bold'> Moria</h1>
            </div>
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="relative mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-inputpassword type="password" name="password" id="password" placeholder="••••••••"
                    required />
                <button type="button" id="togglePassword" class="absolute inset-y-10 right-0 flex items-center pr-3 focus:outline-none">
                    <span id="toggleButtonText" class="text-gray-500 dark:text-white">Tampilkan</span>
                </button>
            </div>
    

            <div class="relative mt-4 ">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-inputpassword id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
                <button type="button" id="toggleConfirmPassword"
                class="absolute inset-y-12 right-0 flex items-center pr-3 focus:outline-none">
                <span id="toggleConfirmPasswordText"
                    class="text-gray-500 dark:text-white">Tampilkan</span>
            </button>
            </div>
            <div class="hidden">
                <x-input id="password" class="block mt-1 w-full" type="password" name="is_admin"  />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
<script>
    const passwordInput = document.getElementById("password");
    const toggleButton = document.getElementById("togglePassword");
    const toggleButtonText = document.getElementById("toggleButtonText");
    
    toggleButton.addEventListener("click", function() {
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleButtonText.textContent = "Sembunyikan";
        } else {
            passwordInput.type = "password";
            toggleButtonText.textContent = "Tampilkan";
        }
    });
    
    
    const confirmPasswordInput = document.getElementById("password_confirmation");
    const toggleConfirmPasswordButton = document.getElementById("toggleConfirmPassword");
    const toggleConfirmPasswordText = document.getElementById("toggleConfirmPasswordText");

    toggleConfirmPasswordButton.addEventListener("click", function () {
        if (confirmPasswordInput.type === "password") {
            confirmPasswordInput.type = "text";
            toggleConfirmPasswordText.textContent = "Sembunyikan";
        } else {
            confirmPasswordInput.type = "password";
            toggleConfirmPasswordText.textContent = "Tampilkan";
        }
    });
    </script>
