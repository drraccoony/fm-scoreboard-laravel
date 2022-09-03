<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Change Password
        </h2>
    </x-slot>
    <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

            @if (isset($status) && $status)
                <p>Password change successful!</p>
                <x-timed-redirect time=5 route="dashboard" />
            @else
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form method="POST" action="{{ route('password.change-store') }}">
                    @csrf
                    <div class="mt-4">
                        <p class="p-2">{{isset($message) ? $message : "Create a new password."}}</p>
                    </div>
                    <!-- New Password -->
                    <div class="mt-4">
                        <x-label for="password" :value="__('New Password')" />

                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button>
                            {{ __('Change Password') }}
                        </x-button>
                    </div>
                </form>
            @endif
        </div>
    </div>
</x-app-layout>
