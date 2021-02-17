<div>
    <?php use App\Http\Controllers\IncidentController;
    use Illuminate\Support\Str;

    ?>
    <table class="table-auto w-full">
        <thead>
            <tr class="bg-gray-400">
                <th class="pr-5 pl-5 border-r border-t border-l border-gray-300">#</th>
                <th class="pr-5 pl-5  border-r border-t border-gray-300">Date</th>
                <th class="pr-5 pl-5  border-r border-t border-gray-300">Reporter</th>
                <th class="pr-5 pl-5  border-r border-t border-gray-300">Dep</th>
                <th class="pr-5 pl-5  border-r border-t border-gray-300">Type</th>
                <th class="pr-5 pl-5 border-r border-t border-gray-300">Assigned To</th>
                <th class="pr-5 pl-5 border-r border-t border-gray-300">View</th>
                <th class="pr-5 pl-5  border-r border-t border-gray-300">Finalized?</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($incidents as $incident)
            <tr class=>
                <td class="p-3 border border-r border-gray-50">{{$incident->incident_no}}</td>
                <td class="p-3 border border-r border-gray-50">{{$incident->date}}</td>
                <td class="p-3 border border-r border-gray-50">{{Str::limit($incident->reporter,15)}}</td>
                <td class="p-3 border border-r border-gray-50">{{$incident->department->name}}</td>
                <td class="p-3 border border-r border-gray-50">{{Str::limit($incident->incident_type,12)}}</td>
                <td class="p-3 border border-r border-gray-50">{{Str::limit($incident->department->owner->name,15)}}</td>

                <td class="p-3 border border-r border-gray-50"><a class="inline-block px-6 py-0 text-xs font-medium leading-6 text-center text-green-500 uppercase transition bg-transparent border-2 border-green-500 rounded ripple hover:bg-green-100 focus:outline-none" href="{{ url("/incidents/{$incident->id}")}}">View</a>
                </td>
                <td class="p-3 border border-r border-gray-50">Yes</td>
            </tr>
            @endforeach



        </tbody>
    </table>
    <div class="pt-4">
        {{ $incidents->links() }}
    </div>

</div>
