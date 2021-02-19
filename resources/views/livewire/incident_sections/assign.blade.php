<div id="assign" class="flex flex-col md:flex-row  flex-wrap md:divide-x divide-gray-50  border border-gray-300 mb-2 mt-2">
    <div class="flex-none w-72 bg-gray-50 border-r border-gray-300">
        <h1 class="text-center underline leading-loose tracking-widest font-extrabold">Assign To Manager</h1>
        <p class="font-sans p-2 leading-loose">
            Assign To Manager
        </p>
    </div>

    <div class="flex flex-auto flex-col space-x-2  p-2 ">
        <div class="flex-auto flex flex-col">
            <div class="flex flex-col">
                <label class="leading-loose">Name:</label>
                <div class=" focus-within:text-gray-600 text-gray-400">
                    <input type="text" placeholder="Managers Name" wire:model="assigned_to_name"
                        class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300   focus:outline-none text-gray-600 @error('assigned_to_name') border-red-500 @enderror ">
                        @error('assigned_to_name') <div class="text-red-600">{{ $message }}</div> @enderror
                    </div>
            </div>


        </div>
        <div class="flex-auto">
            <label class="leading-loose">Email:</label>
            <div class=" focus-within:text-gray-600 text-gray-400">
                <input type="text" placeholder="Managers  Email" wire:model="assigned_to_email"
                    class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600 @error('assigned_to_email') border-red-500 @enderror">
                    @error('assigned_to_email') <div class="text-red-600">{{ $message }}</div> @enderror
                </div>
        </div>
        <div class="flex-col p-2 w-full">
            <div class="grid justify-items-stretch">
                <div class="justify-self-center">
                    <button wire:click="assignToManager({{$incident_id}})"
                    class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-green-500 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none">
                    Assign to Manager
                </button>
                <div class="flex items-center bg-blue-900 text-white text-sm font-bold px-4 py-3" wire:loading wire:target="assignToManager">
                    Sending Email to {{$assigned_to_name}}
                </div>

                </div>
              </div>
        </div>
    </div>




</div>
