<!-- This example requires Tailwind CSS v2.0+ -->
{{-- {{$items}} --}}
<div class="flow-root">
    @if (!$items->isEmpty())
    <ul role="list" class="-mb-8">
      @foreach($items as $item)
      <li>
        <div class="relative pb-8">
          <span class="absolute top-4 left-4 -ml-px h-full w-0.5 @if(!$loop->last) bg-gray-200 @endif" aria-hidden="true"></span>
          <div class="relative flex space-x-3">
            <div>
              <span class="h-8 w-8 rounded-full bg-gray-400 flex items-center justify-center ring-8 ring-white">
                <!-- Heroicon name: mini/user -->
                <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z" />
                </svg>
              </span>
            </div>
            <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
              <div>
                <p class="text-sm text-gray-500">Logged <span class="font-medium text-gray-900">{{$item->activity->type}}</span> called <span class="font-medium text-gray-900">{{$item->activity->name}}</span></p>
              </div>
              <div class="whitespace-nowrap text-right text-sm text-gray-500">
                <time>{{$item->created_at->format('M j')}}</time>
              </div>
            </div>
          </div>
        </div>
      </li>
      @endforeach

    </ul>
    @else
    <div class="text-center rounded-lg border-2 border-dashed border-gray-300 p-6">
      <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
        <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
      </svg>
      <h3 class="mt-2 text-sm font-medium text-gray-900">No Logged Activities</h3>
      <p class="mt-1 text-sm text-gray-500">Get started by scanning an activity QR code or logging an activity manually by ID.</p>
    </div>
    @endif
  </div>





  <!-- This example requires Tailwind CSS v2.0+ -->
  {{-- <div class="text-center">
    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
      <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
    </svg>
    <h3 class="mt-2 text-sm font-medium text-gray-900">No projects</h3>
    <p class="mt-1 text-sm text-gray-500">Get started by creating a new project.</p>
    <div class="mt-6">
      <button type="button" class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
        <!-- Heroicon name: mini/plus -->
        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
        </svg>
        New Project
      </button>
    </div>
  </div> --}}
