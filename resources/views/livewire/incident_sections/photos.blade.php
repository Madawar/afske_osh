<?php use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
?>
<div class="w-auto m-8 text-gray-800 bg-white divide-y divide-gray-300 rounded-lg shadow-md sm:m-4">
    <div class="flex items-start px-6 py-5">
        <h2 class="mr-auto">
            <span class="block font-sans text-2xl font-semibold text-gray-900 ">Incident Photos and
                Attachments</span>
            <span class="block font-light text-gray-800">Please Upload all attachments that Pertain to the Incident/
                Hazard<span>
        </h2>
    </div>
    <div class=" px-6 py-4">
        <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">
            <div class="flex w-full items-center justify-center mt-2">
                <div class="btn-group">
                    <label class="btn  btn-info">
                        <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                        </svg>
                        <span class="m-2 text-base leading-normal">Click to select a file to upload</span>
                        <input type='file' class="hidden" wire:model="photos" multiple />
                    </label>

                    <button class="btn btn-success " wire:click="savePhoto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                d="M7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V6h5a2 2 0 012 2v7a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2h5v5.586l-1.293-1.293zM9 4a1 1 0 012 0v2H9V4z" />
                        </svg>
                        Upload Photo
                    </button>

                </div>

            </div>

        </div>

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
    @if ($photos)
        <div class="px-6 py-2 font-light text-gray-600">
            <span class="font-semibold text-black"></span>
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
                                    <img class="object-contain h-12 w-full " src="{{ $photo->temporaryUrl() }}">
                                @endif
                            </td>
                        </tr>
                    @endforeach



                </tbody>
            </table>
        </div>
    @endif

    @isset ($incident->photos)
        <div class="px-6 py-2 font-light text-gray-600">
            <div class="overflow-x-auto w-full">

                <table class="table table-compact">
                    <thead>
                        <th>
                            #</th>
                        <th>
                            Uploaded Files</th>

                    </thead>
                    <tbody>
                        @foreach ($incident->photos as $photo)
                            <tr>
                                <td>
                                    {{ $loop->index + 1 }}</td>
                                <td>
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
        </div>
    @endisset

</div>
