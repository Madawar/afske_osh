<div>
    <div class="p-2 border border-gray-300 border-opacity-90 filter md:drop-shadow-sm mb-3">

        <ul class=" w-full steps">
            <li class="step step-info">Choose Contributing Factors</li>
            <li class="step ">Corrective Actions</li>
            <li class="step ">Preventive Actions</li>

        </ul>
    </div>
    <div class="alert alert-info">
        Please Choose atleast one factor that caused this incident and click next, if it has been already chosen click next
    </div>
    <table class="table table-compact table-zebra w-full">
        <thead>

            <tr>
                <th>Choose</th>
                <th>Category</th>
                <th>Factor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($factor_group as $key => $factors)
                <tr>
                    <td colspan="3 " class="text-center text-bold">{{ $key }}</td>
                </tr>
                @foreach ($factors as $factor_item)
                    <tr>
                        <td>
                            @if (in_array($factor_item->id, $existing_findings))
                               <div class="badge badge-primary">Chosen</div>

                            @else

                                <x-forms.checkbox label="" placeholder="Factor" value="true"
                                    wire:model="factor.{{ $factor_item->id }}" name="factor[]" />
                            @endif

                        </td>
                        <td>{{ $factor_item->category }}</td>
                        <td>{{ $factor_item->factor }}</td>
                    </tr>

                @endforeach

            @endforeach

        </tbody>
        <tfoot>
            <tr>
                <th>Choose</th>
                <th>Category</th>
                <th>Factor</th>
            </tr>
        </tfoot>
    </table>

    @if ($errors->any())
        {!! implode('', $errors->all('<div class="alert alert-error">:message</div>')) !!}
    @endif
    <div class="p-2 m-4">
        <button class="btn btn-primary btn-block" wire:click='advance' wire.target='advance'
            wire.loading.class="loading">
            Next
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" wire.loading.remove
                wire.target='advance' class="inline-block w-6 h-6 ml-2 stroke-current">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    </div>
</div>
