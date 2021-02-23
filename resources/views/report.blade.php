
<?php include public_path('css/app.css'); ?>

@section('content')
    <div>
        <div class="flex flex-row">

            <div class="flex-auto">
                a
            </div>

            <div class="flex-auto">
                b
            </div>

        </div>

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
            </tbody>
        </table>

    </div>
@endsection
