<div>
    <?php
    use App\Http\Controllers\IncidentController;
    use Illuminate\Support\Str;
    ?>

    <div class="bg-gray-50 border-gray-300 shadow-sm mb-1 border overflow-x-auto">
        <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">

            <div class="flex-auto">
                <x-forms.select :options="[5=>5,10=>10,20=>20,30=>30]" label="" placeholder="How Many Results Per Page"
                    wire:model="pagination" name="Pagination" />
            </div>
            <div class="flex-auto">
                <x-forms.input label="" placeholder="Search Anything" wire:model="search" name="search" />
            </div>
            <div class="flex-auto">
                <x-forms.select :options="$options" label="" placeholder="Filter" wire:model="filter" name="search" />
            </div>

            <div class="flex-auto">


                <button class=" btn btn-square btn-block md:btn-circle" wire:click='download'>
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-6 h-6 stroke-current" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>

                </button>

            </div>
        </div>


    </div>



    <div class="overflow-x-auto">
        <table class="table w-full table-compact table-zebra" wire:loading.class="cursor-wait">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Reporter</th>
                    <th>Dep</th>
                    <th>Type</th>
                    @if (Auth::user()->account_type == 'osh')
                        <th>Assigned To</th>
                    @endif
                    <th>View</th>
                    <th>Finalized?</th>
                    @if (Auth::user()->account_type == 'osh')
                        <th>Delete</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($incidents as $incident)
                    <tr>
                        <td>
                            <a href="{{ url("/incidents/{$incident->id}") }}?word=true"">{{ $incident->incident_no }}</a></td>
                    <td>
                          {{ Carbon\Carbon::parse($incident->date)->format('j-M-y') }}  <!--<span
                                class="

                                text-sm">({{ Carbon\Carbon::parse($incident->date)->diffInDays(Carbon\Carbon::today()) }}
                                days
                                ago)--></span>

                        </td>
                        <td>{{ Str::limit($incident->reporter, 15) }}</td>
                        <td>{{ $incident->department->name }}</td>
                        <td>{{ Str::limit($incident->incident_type, 12) }}</td>
                        @if (Auth::user()->account_type == 'osh')
                            <td>
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
                        <td>
                            <a class="btn  btn-square btn-xs btn-success"
                                href="{{ url("/incidents/{$incident->id}") }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>

                            </a>
                            <a class="btn  btn-square btn-xs btn-error "
                                href="{{ url("incident/response/factor/{$incident->id}") }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
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
                                    class="btn btn-error btn-sm">
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
    </div>



</div>
