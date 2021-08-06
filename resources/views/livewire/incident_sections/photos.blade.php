<div id="assign" class="flex flex-col md:flex-col  flex-wrap   border border-gray-300 m-5">
    <?php use Illuminate\Support\Str;
    use Illuminate\Support\Facades\Storage;
    ?>

    <div
        class="flex items-center justify-center w-full text-center leading-loose  border-b border-gray-300 p-2  text-lg font-semibold tracking-widest text-gray-900 uppercase shadow-sm ">
        Upload Incident Photos, Documents and Additional Reports
    </div>

    <div class="flex flex-auto flex-col space-x-2  p-2 m-5 border border-gray-300">

        <div class="flex flex-row ">

            @if ($images)
                <div class="overflow-x-auto w-full">

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
                            @foreach ($images as $photo)
                                <tr
                                    class="bg-white  lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                    <td
                                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                        {{ $loop->index + 1 }}</td>
                                    <td
                                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                        <a href="{{ Storage::url('photos/' . $photo) }}" class="btn btn-xs">
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
                </div>

            @endif
        </div>


        <div class="flex flex-row w-full items-center justify-center mb-1">

            @if ($photos)
                <div class="alert alert-error mb-1">
                    <div class="flex-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                        <label>Please Click upload Photo to save it</label>
                    </div>
                </div>


            @endif
        </div>

        <div class="flex flex-row border-b border-gray-400 mt-10">

            <div class="overflow-x-auto w-full">
                <table class="table w-full table-compact">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Extension</th>
                            <th>Preview</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($photos as $photo)
                            <tr>
                                <th>{{ $loop->index + 1 }}</th>
                                <td>{{ $photo->guessExtension() }}</td>
                                <td>
                                    @if (in_array($photo->guessExtension(), ['png', 'gif', 'bmp', 'svg', 'wav', 'mp4', 'mov', 'avi', 'wmv', 'mp3', 'm4a', 'jpg', 'jpeg', 'mpga', 'webp', 'wma']))
                                        <img class="object-contain h-48 w-full " src="{{ $photo->temporaryUrl() }}">
                                    @endif
                                </td>
                            </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>

        </div>



        <div class="flex w-full items-center justify-center mt-2">
            <label
                class="w-80 h-20 flex flex-col items-center px-4 py-6 bg-white text-blue-700 rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue-800 hover:text-white">
                <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                </svg>
                <span class="m-2 text-base leading-normal">Click to select a file to upload</span>
                <input type='file' class="hidden" wire:model="photos" multiple />
            </label>
        </div>

        @error('photos.*') <span class="error">{{ $message }}</span> @enderror
        <div class="grid justify-items-stretch">
            <div class="justify-self-center">
                <button
                    class="mt-1 inline-block px-6 py-0 text-xs font-medium leading-6 text-center text-green-500 uppercase transition bg-transparent border-2 border-green-500 rounded ripple hover:bg-green-100 focus:outline-none"
                    wire:click="savePhoto">Upload Photo</button>
            </div>
        </div>





    </div>
</div>
