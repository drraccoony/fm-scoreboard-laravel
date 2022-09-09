<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-simple-body>
        {{-- You're logged in! --}}
        <div class="grid grid-cols-2 gap-12">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-6">Your Team Ranking</h2>
                <span class="text-gray-500">Feature Coming Soon</span>
            </div>
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-6">Last 5 Logged Activities</h2>
                <x-feed :items=$myfeed />
            </div>
          </div>
    </x-simple-body>

</x-app-layout>
