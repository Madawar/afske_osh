<div id="assign" class="flex flex-col md:flex-row  flex-wrap md:divide-x divide-gray-50  border border-gray-300 mb-2">
    <?php use Illuminate\Support\Str;
     use Illuminate\Support\Facades\Storage;
    ?>
    <div class="flex-none w-72 bg-gray-50 border-r border-gray-300">
        <h1 class="text-center underline leading-loose tracking-widest font-extrabold">Upload Photos</h1>
        <p class="font-sans p-2 leading-loose">
            Upload Photos
        </p>
    </div>

    <div class="flex flex-auto flex-col space-x-2  p-2 ">
        <div class="flex flex-row">

            @if ($images)
            Uploaded Photos:
                @foreach ($images as $photo)
                    <img class="object-contain h-48 w-full " src="{{ Storage::url('photos/'.$photo) }}">
                @endforeach
            @endif
        </div>
        <div class="flex flex-row">

            @if ($photos)
            Photo Preview: <span class="text-red-800">Please Click upload Photo to save it</span>
                @foreach ($photos as $photo)
                    <img class="object-contain h-48 w-full " src="{{ $photo->temporaryUrl() }}">
                @endforeach
            @endif
        </div>
        <input type="file" wire:model="photos" multiple>

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
