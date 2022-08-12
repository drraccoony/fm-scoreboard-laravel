<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit {{$user->name}} (Admin)
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 p-6">
                    <p>Editing: {{$user->name}}</p>
                    <p>Email: {{$user->email}}</p>
                    <p>Badge Number: {{$user->badge_number}}</p>
                    <p>Team: {{$user->team->name}}</p>
                    <p>Created: {{$user->created_at}}</p>
                    <p>Updated: {{$user->updated_at}}</p>
                    @if ($user->is_admin == 0)
                        <p>Status: Attendee</p>
                    @else
                        <p>Status: Admin</p>
                    @endif
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
