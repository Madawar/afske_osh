<div class="flex flex-col md:flex-row  flex-wrap md:divide-x divide-gray-50  border border-gray-300 mb-2">
    <div class="flex-none w-72 bg-gray-50 border-r border-gray-300">
        <h1 class="text-center underline leading-loose tracking-widest font-extrabold">Reporters Personal Details</h1>
        <p class="font-sans p-2 leading-loose">
            Please Enter Your Personal Details.
        </p>
    </div>

    <div class="flex flex-auto    ">
        <div class="flex-auto p-2">
            <div class="flex flex-col">
                <label class="leading-loose">Name:</label>
                <div class=" focus-within:text-gray-600 text-gray-400">
                    <input type="text" placeholder="Your Name" wire:model="reporter"
                        class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300   focus:outline-none text-gray-600 @error('reporter') border-red-500 @enderror ">
                    @error('reporter') <div class="text-red-600">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="flex flex-col">
                <label class="leading-loose">Reporter Email:</label>
                <div class=" focus-within:text-gray-600 text-gray-400">
                    <input type="text" placeholder="Your Email" wire:model="reporter_email"
                        class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600 @error('reporter_email') border-red-500 @enderror">
                    @error('reporter_email') <div class="text-red-600">{{ $message }}</div> @enderror
                </div>
            </div>

        </div>


    </div>
    <div class="flex-auto p-2">
        <div class="flex flex-col">
            <label class="leading-loose">Payroll Number:</label>
            <div class=" focus-within:text-gray-600 text-gray-400">
                <input type="text" placeholder="Payroll Number" wire:model="pno"
                    class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600 @error('pno') border-red-500 @enderror">
                @error('pno') <div class="text-red-600">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="flex flex-col">
            <label class="leading-loose">Telephone Number:</label>
            <div class=" focus-within:text-gray-600 text-gray-400">
                <input type="text" placeholder="Your Telephone Number" wire:model="telephone"
                    class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600 @error('telephone') border-red-500 @enderror">
                @error('telephone') <div class="text-red-600">{{ $message }}</div> @enderror
            </div>
        </div>

    </div>

    <div class="flex-auto">
        <div class="flex flex-col p-2">
            <label class="leading-loose">Department:</label>
            <div class=" focus-within:text-gray-600 text-gray-400">
                <select type="text" placeholder="Department" wire:model="department_id"
                    class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600 @error('department_id') border-red-500 @enderror">
                    <option>Please Choose</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach

                </select>
                @error('department_id') <div class="text-red-600">{{ $message }}</div> @enderror
            </div>
        </div>
        <div class="flex flex-col p-2">
            <label class="leading-loose">Report Type:</label>
            <div class=" focus-within:text-gray-600 text-gray-400">
                <select type="text" placeholder="Report Type" wire:model="report_type"
                    class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600 @error('report_type') border-red-500 @enderror">

                    <option value="">Please Choose</option>
                    <option value="normal">Normal</option>
                    <option value="confidential">Confidential</option>
                    <option value="anonymous">Anonymous</option>

                </select>
                @error('report_type') <div class="text-red-600">{{ $message }}</div> @enderror
            </div>
        </div>
    </div>

</div>
