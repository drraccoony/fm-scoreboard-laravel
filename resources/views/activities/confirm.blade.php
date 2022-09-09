<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Delete Activity Warning (Admin)
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 p-6">
                    <p class="text-red-500 pr-4">WARNING</p>
                    You are about to delete this activity permanantly
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul>
                        <li>{{$activity->name}} 
                        <a href="{{route('users')}}" class="text-blue-700 pl-6 pr-4">Cancel</a> <a href="{{route('users.delete',[$user->id])}}" class="text-red-500 pr-4">Delete</a> 
                       </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
