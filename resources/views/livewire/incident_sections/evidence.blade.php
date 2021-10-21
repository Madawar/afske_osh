<?php
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
?>


<div class="flex flex-auto flex-col space-x-2  p-2 ">
    <div class="">
        @if ($this->incident->evidence)
            <table class="table-auto w-full border-collapse mt-1 mb-1">
                <thead>
                    <th
                        class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        #</th>
                    <th
                        class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        Uploaded Files</th>

                </thead>
                <tbody>
                    @foreach ($this->incident->evidence as $file)
                        <tr
                            class="bg-white  lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                            <td
                                class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                {{ $loop->index + 1 }}</td>
                            <td
                                class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                <a href="{{ Storage::url('evidence/' . $file) }}" class="btn btn-xs">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    View File

                                </a>
                            </td>

                        </tr>
                    @endforeach

                </tbody>


            </table>


        @endif
    </div>
    <div class="">

        @if ($evidenceFiles)

            <div class="alert alert-warning mt-1 mb-1">
                <div class="flex-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="w-6 h-6 mx-2 stroke-current">
                        <!---->
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                        </path>
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                    </svg>
                    <label>Please click on upload Evidence to save it on the server</label>
                </div>
            </div>
            <table class="table-auto w-full border-collapse mt-1 mb-1">
                <thead>
                    <th
                        class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        #</th>
                    <th
                        class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        Unsaved Files</th>

                </thead>
                <tbody>
                    @foreach ($evidenceFiles as $evidence)
                        <tr
                            class="bg-white  lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                            <td
                                class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                {{ $loop->index + 1 }}</td>
                            <td
                                class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                {{ $evidence }}
                            </td>

                        </tr>
                    @endforeach

                </tbody>


            </table>
        @endif
    </div>
    <input type="file" wire:model="evidenceFiles" multiple>

    @error('evidenceFiles.*') <span class="error">{{ $message }}</span> @enderror
    @if (Auth::user()->account_type != 'osh')
        <div class="grid justify-items-stretch">
            <div class="justify-self-center">
                <button class="btn btn-primary" wire:click="saveEvidence">Upload Evidence</button>
            </div>
        </div>
    @endif




</div>
