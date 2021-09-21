<div>
    <div class="p-2 border border-gray-300 border-opacity-90 filter md:drop-shadow-sm mb-3">

        <ul class=" w-full steps">
            <li class="step step-info">Choose Contributing Factors</li>
            <li class="step ">Corrective Actions</li>
            <li class="step ">Preventive Actions</li>
            <li data-content="?" class="step step-error">Close Incident</li>
            </ul>
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
                            <x-forms.checkbox label="" placeholder="Factor" value="true"
                                wire:model="factor.{{ $factor_item->id }}" name="factor[]" />
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

    <div class="p-2 m-4">
        <button class="btn btn-primary btn-block" wire:click='advance'>
            Next

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 ml-2 stroke-current">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
      </button>
    </div>
</div>
