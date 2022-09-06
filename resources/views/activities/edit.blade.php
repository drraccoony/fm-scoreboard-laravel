<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Activity (Admin)
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 p-6">
                    <div class="mt-10 sm:mt-0">
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Activity Information</h3>
                                    <p class="mt-1 text-sm text-gray-600">Create an activity that users can check-in
                                        with.</p>
                                    <h3 class="text-md font-medium leading-3 text-gray-900 pt-6">Start & End values (Optional)</h3>
                                    <p class="mt-1 text-xs text-gray-600">Date time for start & end is optional
                                        if you want to limit when the check-in can be used. If blank, players can checkin
                                    whenever.</p>
                                </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <form method="POST" action="{{route('activities.update',['activity' => $activity])}}">
                                    @csrf
                                    @method('PUT')
                                    <div class="shadow overflow-hidden sm:rounded-md">
                                        <!-- Validation Errors -->
                                        <x-validation-errors class="mb-4" :errors="$errors" />
                                        <div class="px-4 py-5 bg-white sm:p-6">
                                            <div class="grid grid-cols-6 gap-6">
                                                <div class="col-span-6 sm:col-span-6">
                                                    <label for="first-name"
                                                        class="block text-sm font-medium text-gray-700">Activity
                                                        Name</label>
                                                    <input type="text" name="name" id="name"
                                                        autocomplete="given-name"
                                                        class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                        value="{{$activity->name}}">
                                                </div>

                                                <div class="col-span-6 sm:col-span-6">
                                                    <label for="last-name"
                                                        class="block text-sm font-medium text-gray-700">Short
                                                        Description</label>
                                                    <textarea type="text" name="description" id="description"
                                                        class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{$activity->description}}</textarea>
                                                </div>

                                                {{-- <div class="col-span-6 sm:col-span-4">
                                            <label for="email-address" class="block text-sm font-medium text-gray-700">Email address</label>
                                            <input type="text" name="email-address" id="email-address" autocomplete="email" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div> --}}

                                                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                                    <label for="type"
                                                        class="block text-sm font-medium text-gray-700">Activity
                                                        Type</label>
                                                    <select id="type" name="type"
                                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                        <option>Panel</option>
                                                        <option value="Mainstage">Main Stage</option>
                                                        <option>Cache</option>
                                                        <option>Special</option>
                                                        <option>Volunteer</option>
                                                        <option>Other</option>
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                                    <label for="guid" class="block text-sm font-medium text-gray-700">GUID</label>
                                                    <div class="mt-1 flex rounded-md shadow-sm">
                                                        <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 013.75 9.375v-4.5zM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 01-1.125-1.125v-4.5zM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0113.5 9.375v-4.5z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 6.75h.75v.75h-.75v-.75zM6.75 16.5h.75v.75h-.75v-.75zM16.5 6.75h.75v.75h-.75v-.75zM13.5 13.5h.75v.75h-.75v-.75zM13.5 19.5h.75v.75h-.75v-.75zM19.5 13.5h.75v.75h-.75v-.75zM19.5 19.5h.75v.75h-.75v-.75zM16.5 16.5h.75v.75h-.75v-.75z" />
                                                            </svg>
                                                            </span>
                                                        <input type="text" name="guid" id="guid" class="block w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{$activity->guid}}">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                                    <label for="points"
                                                        class="block text-sm font-medium text-gray-700">Points</label>
                                                    <input type="text" name="points" id="points" value="{{$activity->points}}"
                                                        class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                                    <label for="starts_at"
                                                        class="block text-sm font-medium text-gray-700">Start</label>
                                                    <input type="datetime-local" name="starts_at" id="starts_at"
                                                        class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                        value="{{$activity->starts_at}}">
                                                </div>

                                                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                                    <label for="ends_at"
                                                        class="block text-sm font-medium text-gray-700">End</label>
                                                    <input type="datetime-local" name="ends_at" id="ends_at"
                                                        class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                        value="{{$activity->ends_at}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                            <button type="submit"
                                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Save</button>
                                                <a href="{{route('activities')}}" class="text-blue-600 hover:text-blue-700 px-4">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
