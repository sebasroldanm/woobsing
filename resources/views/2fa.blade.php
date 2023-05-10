<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Para verificar, se habilito la autenticación de dos factores, debes ir a tu Email y verificar el código de verificación') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('2fa.store') }}">
            @csrf
            <input id="code" name="code" type="number" class="form-control" required autofocus>
            <x-primary-button>
                {{ __('Comprobar código') }}
            </x-primary-button>
        </form>


    </div>

    <div class="mt-4 flex items-center justify-between">
        <form method="GET" action="{{ route('2fa.resend') }}">
            @csrf
            <div>
                <x-primary-button>
                    {{ __('Reenviar código de verificación') }}
                </x-primary-button>
            </div>

            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                {{ session()->get('error') }}
                {{ session()->get('success') }}
            </div>
        </form>
    </div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button type="submit"
            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
            {{ __('Log Out') }}
        </button>
    </form>
</x-guest-layout>
