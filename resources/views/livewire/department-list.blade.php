<div>
    <div class="">
        <div class="flex md:space-x-4 pb-5">
            <div class="flex-auto">
                <div class="flex flex-col">
                    <label class="leading-loose">Name:</label>
                    <div class=" focus-within:text-gray-600 text-gray-400">
                        <input type="text" placeholder="Department" wire:model="name"
                            class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300   focus:outline-none text-gray-600 @error('name') border-red-500 @enderror ">
                        @error('name') <div class="text-red-600">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
            <div class="flex-auto">
                <div class="flex flex-col">
                    <label class="leading-loose">Manager:</label>
                    <div class=" focus-within:text-gray-600 text-gray-400">
                        <select type="text" placeholder="Department Manager" wire:model="manager_id"
                            class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600 @error('manager_id') border-red-500 @enderror">
                            @foreach ($managers as $manager)
                                <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                            @endforeach

                        </select>
                        @error('manager_id') <div class="text-red-600">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
            <div class="flex-auto">

                <div class="flex flex-col">
                    <label class="leading-loose">&nbsp;</label>
                    <div class=" focus-within:text-gray-600 text-gray-400">
                        <button wire:click="addDepartment"
                            class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-green-500 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none">
                            Add Department
                        </button>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <table class="table-auto w-full">
        <thead>
            <tr class="bg-gray-400">
                <th class="pr-5 pl-5 border-r border-t border-l border-gray-300">Department</th>
                <th class="pr-5 pl-5  border-r border-t border-gray-300">Manager</th>
                <th class="pr-5 pl-5  border-r border-t border-gray-300">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departments as $department)
                <tr class=>
                    <td class="p-3 border border-r border-gray-50">{{ $department->name }}</td>
                    <td class="p-3 border border-r border-gray-50">{{ $department->owner->name }}</td>
                    <td class="p-3 border border-r border-gray-50"></td>
                </tr>
            @endforeach



        </tbody>
    </table>
    <div class="pt-4">
        {{ $departments->links() }}
    </div>
</div>
