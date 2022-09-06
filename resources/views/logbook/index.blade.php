<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Your Score Logbook
        </h2>
    </x-slot>

    <x-slot name="slot">
        <x-simple-body>
            Logged Points
        </x-simple-body>
        <x-simple-body>
            <p class="text-gray-500 pb-6">
                Here you can view all the activities that you've earned, and their associated point value. Don't stop
                now! Keep earning
                points for your team!
            </p>
            <div class="pb-4">
                {{ $activities->links() }}
            </div>
            <div class="overflow-x-auto relative">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                Activity
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Type
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Points
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Team
                            </th>
                            <th scope="col" class="py-3 px-6">
                                When
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activities as $item)
                            <tr class="bg-white border-b">
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $item->activity->name }}
                                </th>
                                <td class="py-4 px-6">
                                    {{ ucfirst($item->activity->type) }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $item->activity->points }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $item->team?->name ?? 'BORKED' }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $item->created_at->format('M j, Y @ h:m A') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="py-4">
                {{ $activities->links() }}
            </div>
        </x-simple-body>
    </x-slot>
</x-app-layout>
