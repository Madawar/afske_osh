<div class="p-2">
    <div class="p-2 bg-gray-200 m-2 mb-3 border border-gray-300 border-opacity-90 filter md:drop-shadow-sm bg-gray-50 ">
        <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">
            <div class="flex-auto">
                <x-forms.input label="" placeholder="Category" wire:model="category" name="category" />
            </div>
            <div class="flex-auto">
                <x-forms.input label="" placeholder="Factor" wire:model="factor" name="factor" />
            </div>
        </div>
        <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">
            <div class="flex-auto">
                <button class=" btn btn-square btn-block md:btn-circle" wire:click='save' wire:target=" save"
                    wire:loading.class="loading">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-6 h-6 stroke-current" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" wire:loading.remove wire:target=" save">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                    </svg>
                    Save
                </button>
            </div>



        </div>
    </div>

    <table class="table table-compact table-zebra w-full">
        <thead>

            <tr>
                <th>Category</th>
                <th>Factor</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($factor_group as $key => $factors)
                <tr>
                    <td colspan="3 " class="text-center text-bold">{{$key}}</td>
                </tr>
                @foreach ($factors as $factor_item)
                    <tr>
                        <td>{{ $factor_item->category }}</td>
                        <td>{{ $factor_item->factor }}</td>


                        <td>
                            <button class="btn  btn-square btn-xs btn-error"
                                wire:click="deleteQuestion({{ $factor_item->id }})" wire:target="deleteQuestion"
                                wire:loading.class="loading">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" wire:loading.remove
                                    wire:target="deleteQuestion">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </button>

                        </td>

                    </tr>

                @endforeach

            @endforeach

        </tbody>
        <tfoot>
            <tr>
                <th>Category</th>
                <th>Factor</th>
                <th>Delete</th>
            </tr>
        </tfoot>
    </table>

</div>
