<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Teams
        </h2>
    </x-slot>

    

    <div class="pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg py-6">

                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-xl font-semibold text-gray-900">Your Current Team: <span class="text-blue-600 font-bold">{{Auth::user()->team ? Auth::user()->team->name : "None"}}</span></h1>
                            <p class="mt-2 text-sm text-gray-600">If you want to change teams, you may choose from the available teams below</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg py-6">
                <div class="px-4 sm:px-6 lg:px-8">

                    <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-semibold text-gray-900">Available Teams</h1>
                        <p class="mt-2 text-sm text-gray-700">Current Teams Available. Changing teams does not move your previous point collection, only impacts new points going forward.</p>
                    </div>
                    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                        @if (Auth::user()->is_admin)
                            <a href="{{route('teams.create')}}" class="inline-flex items-center justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 sm:w-auto">
                            Create Team</a>
                        @endif
                    </div>
                    </div>
                    <div class="mt-8 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="text-left text-xs font-medium uppercase tracking-wide text-gray-500 sm:pl-2"></th>
                                    <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500 sm:pl-6">Name</th>
                                    @if (Auth::user()->is_admin)
                                    <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500 sm:pl-6">Total Score</th>
                                    @endif
                                    <th scope="col" class="relative py-3 pl-3 pr-4 sm:pr-6"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @if($teams->isEmpty())
                                    <tr>
                                        <td class="whitespace-nowrap text-center py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6" colspan="100%"><span class="font-semibold">No teams exist to join.</span><br>
                                        <span class="text-gray-400">An application administrator should create some teams for you to join.</span></td>
                                    </tr>
                                @endif
                                @foreach($teams as $team)
                                <tr>
                                <td class="whitespace-nowrap text-sm font-medium text-gray-900 sm:pl-3" style="background-color:{{$team->color}};" title="{{$team->color}}"></td>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$team->name}}</td>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$team->player_count($team->id)}}</td>
                                
                                @if(Auth::user()->is_admin)
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$team->points ? $team->points : 0}}</td>
                                @endif
                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    @if (Auth::user()->team_id == $team->id)
                                        <span class="text-gray-300 px-4">Selected</span>
                                    @else
                                        <a href="#" class="text-green-600 hover:text-green-900 px-4">Join</a>
                                    @endif
                                    @if (Auth::user()->is_admin) 
                                        <a href="{{route('teams.edit',['team'=>$team->id])}}" class="text-blue-600 hover:text-blue-900 px-4">Edit</a>
                                        <a href="#" class="text-red-600 hover:text-red-900 px-4">Delete</a>
                                    @endif
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="px-12 py-6 text-gray-500">
                Reminder: You're an admin, you're seeing functions that other users cannot see or use.
            </div>
        </div>
    </div>
</x-app-layout>
