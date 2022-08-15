<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Team: {{$team->name}} (Admin)
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
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Team Information</h3>
                                    <p class="mt-1 text-sm text-gray-600">Create an team that users can join.</p>
                                    
                                </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <form method="POST" action="{{route('teams.update',['team' => $team])}}">
                                    @csrf
                                    @method('PUT')
                                    <div class="shadow overflow-hidden sm:rounded-md">
                                        <!-- Validation Errors -->
                                        <x-validation-errors class="mb-4" :errors="$errors" />
                                        <div class="px-4 py-5 bg-white sm:p-6">
                                            <div class="grid grid-cols-6 gap-6">
                                                <div class="col-span-6 sm:col-span-6">
                                                    <label for="name"
                                                        class="block text-sm font-medium text-gray-700" >Team Name</label>
                                                    <input type="text" name="name" id="name" value="{{$team->name}}"
                                                        class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div class="col-span-6 sm:col-span-2">
                                                    <label for="locked"
                                                        class="block text-sm font-medium text-gray-700">Team Color</label>
                                                    <input class="mt-1 h-10 w-32 border border-gray-300 rounded-md shadow-sm" type="color" id="color" name="color" value="{{$team->color}}" />
                                                </div>

                                                <div class="col-span-6 sm:col-span-2">
                                                    <label for="locked"
                                                        class="block text-sm font-medium text-gray-700">Locked</label>
                                                    <select id="locked" name="locked" value="{{$team->locked}}"
                                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                        <option value="0">Not Locked</option>
                                                        <option value="1">Locked</option>
                                                    </select>
                                                </div>
                                                <div class="col-span-6 sm:col-span-2">
                                                </div>
                                                <div class="col-span-6 sm:col-span-2">
                                                    <label for=""
                                                        class="block text-sm font-medium text-gray-700">Created</label>
                                                    <div class="py-3">{{$team->created_at}}</div>
                                                </div>
                                                <div class="col-span-6 sm:col-span-2">
                                                    <label for=""
                                                        class="block text-sm font-medium text-gray-700">Owner</label>
                                                    <div class="py-3">{{$team->owner->name}}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                            <button type="submit"
                                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Save</button>
                                                <a href="{{route('teams')}}" class="text-blue-600 hover:text-blue-700 px-4">Cancel</a>
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
