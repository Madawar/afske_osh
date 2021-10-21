<div class="w-auto m-8 text-gray-800 bg-white divide-y divide-gray-300 rounded-lg shadow-md sm:m-4">
    <div class="flex items-start px-6 py-5">
        <h2 class="mr-auto">
            <span class="block font-sans text-2xl font-semibold text-gray-900 ">Staff Involved in Accident</span>
            <span class="block font-light text-gray-800">    Please enter details of staff involved and injuries</span>
        </h2>
    </div>
    <div class=" px-6 py-4">
        <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">

            <div class="flex-auto">
                <x-forms.input label="Name Of Staff" placeholder="Name Of Staff" wire:model="staff_name" name="staff_name" />
            </div>
            <div class="flex-auto">
                <x-forms.input label="staff Payroll Number" placeholder="staff Payroll Number" wire:model="staff_pno"
                    name="staff_pno" />
            </div>


        </div>

        <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">
            <div class="flex-auto">
                <x-forms.textarea label="Staff Injury" placeholder="Staff Injury" wire:model="staff_injury"
                    name="staff_injury" />
            </div>
        </div>

        <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">
            <div class="flex-auto">
                <button wire:click="addStaff" class="btn btn-block">Add Staff Injured</button>
            </div>
        </div>

    </div>
    <div class="px-6 py-2 font-light text-gray-600">
        <span class="font-semibold text-black"></span>
        <table class=" table table-compact w-full">
            <thead>
              <tr>
            <th>Staff</th>
            <th>Staff Payroll</th>
            <th>Staff Injury</th>
            <th>Remove</th>
            </tr>
            </thead>
            <tbody>
                @isset ($this->incident->staff)
                @foreach ($this->incident->staff as $st)
                    <tr >
                        <td>{{ $st['staff_name'] }}</td>
                        <td>{{ $st['staff_pno'] }}</td>
                        <td>{{ Str::limit($st['staff_injury'], 20)  }}</td>
                        <td> <button wire:click="removeStaff({{$loop->index}})" >Remove</button></td>
                    </tr>
                @endforeach
                @endisset

            </tbody>
        </table>

    </div>

</div>
