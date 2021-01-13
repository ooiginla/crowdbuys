<x-home-layout>

    <x-slot name="pagetitle">
        Confirm Password
    </x-slot>

    <div class="page-title background-page" style="margin-bottom: 0">
        <div class="container">
            <h1>Confirm Password</h1>
            <div class="breadcrumbs">
                <ul>
                    <li><a href="index.html">Home</a><span>/</span></li>
                    <li>Confirm Password</li>
                </ul>
            </div><!-- .breadcrumbs -->
        </div>
    </div><!-- .page-title -->

    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <div class="flex justify-end mt-4">
                <x-button>
                    {{ __('Confirm') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-home-layout>
