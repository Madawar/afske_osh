<div>
    <?php
    use App\Http\Controllers\IncidentController;
    use Illuminate\Support\Str;
    ?>
    <div class="my-2 flex sm:flex-row flex-col justify-center bg-gray-100 p-2 shadow-sm">
        <div class="flex flex-row mb-1 sm:mb-0">



            <div class="relative">
                <select wire:model="pagination"
                    class="appearance-none h-full rounded-l border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                </select>

            </div>

            <div class="relative">
                <select wire:model="filter"
                    class="appearance-none h-full rounded-r border-t sm:rounded-r-none sm:border-r-0 border-r border-b block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
                    <option value="null">All</option>
                    <option value="1">Finalized</option>
                    <option value="unassigned">Unassigned For Closure</option>
                    <option value="review">For Review By Osh Department</option>
                    <option value="unresponsive">Assigned But No Response</option>
                    <option value="deleted">Deleted</option>
                    <option value="toMe">Assigned To Me</option>
                </select>

            </div>
        </div>
        <div class="block relative">
            <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
                <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                    <path
                        d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                    </path>
                </svg>
            </span>
            <input placeholder="Search" wire:model="search"
                class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
        </div>

    </div>
    <div class="grid justify-items-stretch">
        <div class="justify-self-center">
            <div wire:loading class="bg-green-700 text-white p-1 shadow-sm">
                Loading ...
            </div>
        </div>
    </div>
    <table class="table-auto w-full" wire:loading.class="cursor-wait">
        <thead>
            <tr class="bg-gray-400">
                <th class="pr-5 pl-5 border-r border-t border-l border-gray-300 cursor-pointer">#</th>
                <th wire:click.prevent="sortBy('date')"
                    class="pr-5 pl-5  border-r border-t border-gray-300 cursor-pointer">Date</th>
                <th class="pr-5 pl-5  border-r border-t border-gray-300 cursor-pointer">Reporter</th>
                <th wire:click.prevent="sortBy('department_id')"
                    class="pr-5 pl-5  border-r border-t border-gray-300 cursor-pointer">Dep</th>
                <th wire:click.prevent="sortBy('incident_type')"
                    class="pr-5 pl-5  border-r border-t border-gray-300 cursor-pointer">Type</th>
                    @if (Auth::user()->account_type == 'osh')
                <th wire:click.prevent="sortBy('assigned_to_name')"  class="pr-5 pl-5 border-r border-t border-gray-300 cursor-pointer">Assigned To</th>
                @endif
                <th class="pr-5 pl-5 border-r border-t border-gray-300">View</th>

                <th class="pr-5 pl-5  border-r border-t border-gray-300">Finalized?</th>
                @if (Auth::user()->account_type == 'osh')
                 <th class="pr-5 pl-5  border-r border-t border-gray-300">Delete</th>
                 @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($incidents as $incident)
                <tr class="">
                    <td class="p-3 border border-r border-gray-50"><a
                            href="{{ url("/incidents/{$incident->id}") }}?word=true"">{{ $incident->incident_no }}</a></td>
                    <td class=" p-3 border border-r border-gray-50">
                          {{ Carbon\Carbon::parse($incident->date)->format('j-M-y') }}  <!--<span
                                class="text-sm">({{ Carbon\Carbon::parse($incident->date)->diffInDays(Carbon\Carbon::today()) }}
                                days
                                ago)--></span>

                    </td>
                    <td class="p-3 border border-r border-gray-50">{{ Str::limit($incident->reporter, 15) }}</td>
                    <td class="p-3 border border-r border-gray-50">{{ $incident->department->name }}</td>
                    <td class="p-3 border border-r border-gray-50">{{ Str::limit($incident->incident_type, 12) }}</td>
                    @if (Auth::user()->account_type == 'osh')
                        <td class="p-3 border border-r border-gray-50">
                            @if ($incident->assigned_to_email == null)

                                <a class="inline-block px-6 py-0 text-xs font-medium leading-6 text-center text-green-500 uppercase transition bg-transparent border-2 border-green-500 rounded ripple hover:bg-green-100 focus:outline-none"
                                    href="{{ url("/incidents/{$incident->id}/edit") }}#assign">
                                    Assign
                                </a>
                            @else
                                {{ $incident->assigned_to_name }}
                            @endif

                        </td>
                        @endif
                        <td class="p-3 border border-r border-gray-50">
                            <a class="inline-block px-6 py-0 text-xs font-medium leading-6 text-center text-green-500 uppercase transition bg-transparent border-2 border-green-500 rounded ripple hover:bg-green-100 focus:outline-none"
                                href="{{ url("/incidents/{$incident->id}") }}">
                                View
                            </a>
                        </td>

                    @if ($incident->finalized)
                        <td class="p-3 border border-r border-gray-50 bg-green-200">
                        @else
                        <td class="p-3 border border-r border-gray-50 bg-red-200">
                    @endif
                    @if ($incident->finalized)
                        Yes
                    @else
                        No
                    @endif
                    </td>
                    @if (Auth::user()->account_type == 'osh')
                    <td>

                        <button wire:click="deleteIncident({{ $incident->id }})"
                        class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-red-500 rounded shadow ripple hover:shadow-lg hover:bg-red-600 focus:outline-none"
                      >
                        Delete
                      </button>
                    </td>
                    @endif
                </tr>
            @endforeach



        </tbody>
    </table>
    <div class="pt-4">
        {{ $incidents->links() }}
    </div>
    <hr/>
    <a href="/incidents?download=true" class="btn mt-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
          </svg>
        Download Incidents

    </a>


</div>
