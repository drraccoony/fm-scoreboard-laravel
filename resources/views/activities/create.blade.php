<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Activity (Admin)
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
                                </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <form action="#" method="POST">
                                    @csrf
                                    <div class="shadow overflow-hidden sm:rounded-md">
                                        <!-- Validation Errors -->
                                        <x-validation-errors class="mb-4" :errors="$errors" />
                                        <div class="px-4 py-5 bg-white sm:p-6">
                                            <div class="grid grid-cols-6 gap-6">
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="first-name"
                                                        class="block text-sm font-medium text-gray-700">Activity
                                                        Name</label>
                                                    <input type="text" name="name" id="name"
                                                        autocomplete="given-name"
                                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="last-name"
                                                        class="block text-sm font-medium text-gray-700">Short
                                                        Description</label>
                                                    <input type="text" name="description" id="description" :value="old( 'description', optional($request)->description )"
                                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                {{-- <div class="col-span-6 sm:col-span-4">
                                            <label for="email-address" class="block text-sm font-medium text-gray-700">Email address</label>
                                            <input type="text" name="email-address" id="email-address" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div> --}}

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="type"
                                                        class="block text-sm font-medium text-gray-700">Activity
                                                        Type</label>
                                                    <select id="type" name="type" autocomplete="country-name"
                                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                        <option>Panel</option>
                                                        <option>Main Stage</option>
                                                        <option>Cache</option>
                                                        <option>Special</option>
                                                        <option>Volunteer</option>
                                                        <option>Other</option>
                                                    </select>
                                                </div>

                                                {{-- <div class="col-span-6">
                                            <label for="street-address" class="block text-sm font-medium text-gray-700">Street address</label>
                                            <input type="text" name="street-address" id="street-address" autocomplete="street-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div> --}}

                                                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                                    <label for="city"
                                                        class="block text-sm font-medium text-gray-700">Points</label>
                                                    <input type="text" name="points" id="points" value="250"
                                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                    <label for="starts_at"
                                                        class="block text-sm font-medium text-gray-700">Start</label>
                                                    <input type="text" name="starts_at" id="starts_at"
                                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                    <label for="ends_at"
                                                        class="block text-sm font-medium text-gray-700">End</label>
                                                    <input type="text" name="ends_at" id="ends_at"
                                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                            <button type="submit"
                                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Save</button>
                                                <a href="#" class="text-blue-600 hover:text-blue-700 px-4"> Cancel</a>
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
