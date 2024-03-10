<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
           
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
        <br>

        <x-button class="ms-4"  id="passwordless-register-btn" style="margin-left: 20%;">
            Login without password
        </x-button>

        <div id="alertContainer" class="fixed inset-x-0 top-0 z-50 flex justify-center mt-4 hidden">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Alert:</strong>
                <span class="block sm:inline" id="alertMessage">Your browser doesn't support WebAuthn.</span>
            </div>
        </div>



    </x-authentication-card>

       <!-- Script for passwordless login -->
<script src="https://cdn.jsdelivr.net/npm/@laragear/webpass@1/dist/webpass.js" defer></script>

<script>
    document.getElementById('passwordless-register-btn').addEventListener('click', async () => {
        try {
            if (Webpass.isUnsupported()) {

                showAlert("Your browser doesn't support WebAuthn.", 3000);
                
                return;
            }

        // Login with WebAuthn:
        const { user, success, error, pending } = await Webpass.assert(
            "/webauthn/login/options", "/webauthn/login"
        );


            if (success) {
                window.location.replace("{{ url('/redirection') }}");
            }
        } catch (error) {
             // Handle error
                console.error('Error during WebAuthn registration:', error);
                showAlert('Error during WebAuthn registration: ' + error.message, 3000);
        }
    });

</script>

<script>
    function showAlert(message, duration = 3000) {
    const alertContainer = document.getElementById('alertContainer');
    const alertMessage = document.getElementById('alertMessage');
    
    // Update alert message
    alertMessage.textContent = message;
    
    // Show alert
    alertContainer.classList.remove('hidden');

        // Hide alert after specified duration
        setTimeout(() => {
        hideAlert();
    }, duration);
}

function hideAlert() {
    const alertContainer = document.getElementById('alertContainer');
    
    // Hide alert
    alertContainer.classList.add('hidden');
}

</script>

</x-guest-layout>
