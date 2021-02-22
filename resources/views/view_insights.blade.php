@extends('layouts.app')

@section('content')
    <div>

        <form method="GET" class="flex flex-row">
            <div class="flex-auto">
                <div class="flex flex-col p-2">
                    <label class="leading-loose">Insight:</label>
                    <div class=" focus-within:text-gray-600 text-gray-400">
                        <select type="text" placeholder="Choose Insight" name="insight"
                            class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600 @error('insight') border-red-500 @enderror">
                            <option>Please Choose</option>
                            <option value="departments">By Department</option>
                            <option value="finalized">Finalized vs Open</option>
                            <option value="type">Type Of Incidents</option>

                        </select>
                        @error('insight') <div class="text-red-600">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
            <div class="flex-auto">
                <div class="flex flex-col p-2">
                    <label class="leading-loose">&nbsp;</label>
                    <button type="submit"
                        class="mt-1 inline-block px-6 py-0 text-xs font-medium leading-6 text-center text-green-500 uppercase transition bg-transparent border-2 border-green-500 rounded ripple hover:bg-green-100 focus:outline-none">Update</button>

                </div>
            </div>
    </div>

    <canvas id="myChart" class="w-full h-full bg-white shadow-lg"></canvas>

    </div>
@endsection

@isset($incidents)
    @if (request()->get('insight') == 'departments')
        @include('charts.departments',['incidents'=>$incidents])
    @endif
    @if (request()->get('insight') == 'type')
        @include('charts.type',['incidents'=>$incidents])
    @endif
    @if (request()->get('insight') == 'finalized')
        @include('charts.finalized',['incidents'=>$incidents])
    @endif


@endisset
