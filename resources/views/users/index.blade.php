<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User List (Admin)
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 p-6">
                    Listing All Users
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul>
                        @foreach($user as $user)
                            <li>{{$user->name}} (Email: {{$user->email}}) {{$user}}
                                @if ($user->is_admin == 0)
                                    <a href="{{route('user.edit',[$user->id])}}" class="text-blue-700 pl-6 pr-4">
                                        Edit
                                    </a>
                                    <a href="{{route('user.confirm',[$user->id])}}" class="text-red-500 pr-4">
                                        Delete
                                    </a>
                                @else 
                                    <a class="text-blue-700 pl-6 pr-4">
                                        Admin
                                    </a>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
