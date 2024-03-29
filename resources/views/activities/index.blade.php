<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Actitivies List (Admin)
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg py-6">
                {{-- <div class="p-6 bg-white border-b border-gray-200 p-6">
                    Listing All Actitivies
                </div> --}}


                
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-semibold text-gray-900">Available Activities</h1>
                        <p class="mt-2 text-sm text-gray-700">A list of all the activities on the platform currently.</p>
                    </div>
                    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                        <a href="{{route('activities.create')}}" class="inline-flex items-center justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 sm:w-auto">Add Activity</a>
                    </div>
                    </div>
                    <div class="mt-8 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="pb-4">
                                {{ $activities->links() }}
                            </div>
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500 sm:pl-6">Name</th>
                                    <th scope="col" class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">Type</th>
                                    <th scope="col" class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">Points</th>                                
                                    <th scope="col" class="relative py-3 pl-3 pr-4 sm:pr-6"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @if($activities->isEmpty())
                                    <tr>
                                        <td class="whitespace-nowrap text-center py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6" colspan="100%"><span class="font-semibold">No activities created.</span><br>
                                        It might be worth <a href="{{route('activities.create')}}" class="text-blue-600">creating an activity</a>.</td>
                                    </tr>
                                @endif
                                @foreach($activities as $activity)
                                <tr>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6"><a href="{{route('activities.view',['activity'=>$activity])}}" class="text-blue-600 hover:text-blue-900 px-4">{{$activity->name}}</a></td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$activity->type}}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$activity->points}}</td>
                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    <a href="{{route('activities.edit',['activity'=>$activity])}}" class="text-blue-600 hover:text-blue-900 px-4">Edit</a>
                                    <a href="#" class="text-red-600 hover:text-red-900 px-4">Delete</a>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                        <div class="pt-4">
                            {{ $activities->links() }}
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
