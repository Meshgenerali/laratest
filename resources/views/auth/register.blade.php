<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
          
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

            <div class="mt-4">
                <x-label for="phone" value="{{ __('phone') }}" />
                <x-input id="phone" class="block mt-1 w-full" type="number" name="phone" :value="old('phone')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="address" value="{{ __('address') }}" />
                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
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

  <!-- Passwordless registration button -->
  <!-- <button class="ms-4" id="passwordless-register-btn">Passwordless Register</button> -->
    <x-button class="ms-4"  id="passwordless-register-btn">
            Register without password
    </x-button>
    </x-authentication-card>

    <!-- Script for passwordless login -->
    <script src="https://cdn.jsdelivr.net/npm/@laragear/webpass@1/dist/webpass.js" defer></script>

    <script>
        document.getElementById('passwordless-register-btn').addEventListener('click', async () => {
            try {
                if (Webpass.isUnsupported()) {
                    alert("Your browser doesn't support WebAuthn.");
                    return;
                }

               // Register credentials:
                const { credential, success, error } = await Webpass.attest(
                    "/webauthn/attest/options", "/webauthn/attest"
                );


                if (success) {
                    window.location.replace("/dashboard");
                }
            } catch (error) {
                console.error('Error during WebAuthn registration:', error);
            }
        });
    </script>

</x-guest-layout>
