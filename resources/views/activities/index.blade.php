<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Actitivies List (Admin)
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 p-6">
                    Listing All Actitivies
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul>
                        @foreach($activities as $activity)
                            <li>{{$activity->name}} (Points: {{$activity->points}}) <a href="#" class="text-blue-700 pl-6 
                            pr-4">Edit</a><a href="#" class="text-red-500 pr-4">Delete</a></li>
                        @endforeach
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
