<div class="flex flex-col md:flex-row  flex-wrap md:divide-x divide-gray-50  border border-gray-300 mb-2 ">
    <div class="flex-none w-72 bg-gray-50 border-r border-gray-300">
        <h1 class="text-center underline leading-loose tracking-widest font-extrabold">Staff Involved in Accident
        </h1>
        <p class="font-sans p-2 leading-loose">
            Please enter details of staff involved and injuries
        </p>
    </div>

    <div class="flex flex-auto flex-col md:flex-row md:space-x-5  p-2 ">
        <div class="flex flex-col flex-auto ">
            <div class="flex flex-row flex-auto space-x-5 ">
                <div class="flex-auto">
                    <div class=" focus-within:text-gray-600 text-gray-400">
                        <input type="text" placeholder="Staff" wire:model="staff_name"
                            class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600 @error('staff_name') border-red-500 @enderror">
                        @error('staff_name') <div class="text-red-600">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="flex-auto">
                    <div class=" focus-within:text-gray-600 text-gray-400">
                        <input type="text" placeholder="Staff Payroll" wire:model="staff_pno"
                            class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600 @error('staff_pno') border-red-500 @enderror">
                        @error('staff_pno') <div class="text-red-600">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="flex-auto">
                    <div class=" focus-within:text-gray-600 text-gray-400">
                        <input type="text" placeholder="Staff Injury" wire:model="staff_injury"
                            class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600 @error('staff_injury') border-red-500 @enderror">
                        @error('staff_injury') <div class="text-red-600">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="flex-none w-48 text-right">
                    <button wire:click="addStaff"
                        class="mt-1 inline-block px-6 py-0 text-xs font-medium leading-6 text-center text-green-500 uppercase transition bg-transparent border-2 border-green-500 rounded ripple hover:bg-green-100 focus:outline-none">Add
                        Staff</button>
                </div>
            </div>
<hr class="mt-2"/>
            <div class="flex flex-row flex-auto space-x-5">
                <table class=" m-5 w-5/6 mx-auto bg-gray-200 text-gray-800"">
                    <thead>
                      <tr class=" text-left border-b-2 border-gray-300">
                    <th class=" text-left border-b-2 border-gray-300">Staff</th>
                    <th class=" text-left border-b-2 border-gray-300">Staff Payroll</th>
                    <th class=" text-left border-b-2 border-gray-300">Staff Injury</th>
                    <th class=" text-left border-b-2 border-gray-300">Remove</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if ($staff != null)
                        @foreach ($staff as $st)
                            <tr class="bg-gray-100 border-b border-gray-200">
                                <td class="px-4 py-3">{{ $st['staff_name'] }}</td>
                                <td class="px-4 py-3">{{ $st['staff_pno'] }}</td>
                                <td class="px-4 py-3">{{ $st['staff_injury'] }}</td>
                                <td class="px-4 py-3"> <button wire:click="removeStaff({{$loop->index}})" >Remove</button></td>
                            </tr>
                        @endforeach
                        @endif

                    </tbody>
                </table>

            </div>



        </div>


    </div>

</div>
