<x-app-layout>
    <x-slot name="header">
        Activity Logging
    </x-slot>

    <x-simple-body>
        <x-simple-banner color="{{$canLogActivity ? 'bg-green-400' : 'bg-red-400'}}">
            {{$statusReason}}
        </x-simple-banner>
        <div class="p-2">
            <h3>Team</h3>
            <p>{{$teamName}}</p>
        </div>
        <div class="p-2">
            <h3>Activity</h3>
            <p>{{$activityName}}</p>
        </div>
    </x-simple-body>
</x-app-layout>