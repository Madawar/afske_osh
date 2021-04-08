<div>
    <?php
    use App\Http\Controllers\AuditController;
    use Illuminate\Support\Str;
    ?>
    <div class="my-2 flex sm:flex-row flex-col justify-center bg-gray-100 p-2 shadow-sm">
        <div class="flex flex-row mb-1 sm:mb-0">
            <div class="relative">
                <select wire:model="pagination"
                    class="appearance-none h-full rounded-l border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                </select>

            </div>

            <div class="relative">
                <select wire:model="filter"
                    class="appearance-none h-full rounded-r border-t sm:rounded-r-none sm:border-r-0 border-r border-b block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
                    <option value="null">All</option>
                    <option value="1">Finalized</option>
                    <option value="unassigned">Unassigned For Closure</option>
                    <option value="review">For Review By Osh Department</option>
                    <option value="unresponsive">Assigned But No Response</option>
                    <option value="toMe">Assigned To Me</option>
                </select>

            </div>
        </div>
        <div class="block relative">
            <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
                <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                    <path
                        d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                    </path>
                </svg>
            </span>
            <input placeholder="Search" wire:model="search"
                class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
        </div>

        <a class="ml-2 inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-blue-700 rounded shadow ripple hover:shadow-lg hover:bg-blue-800 focus:outline-none"
            href="{{ route('audit.create') }}"> New Audit</a>

    </div>
    <div class="grid justify-items-stretch">
        <div class="justify-self-center">
            <div wire:loading class="bg-green-700 text-white p-1 shadow-sm">
                Loading ...
            </div>
        </div>
    </div>
    <table class="table-auto w-full" wire:loading.class="cursor-wait">
        <thead>
            <tr class="bg-gray-400">
                <th class="pr-5 pl-5 border-r border-t border-l border-gray-300 cursor-pointer">#</th>
                <th wire:click.prevent="sortBy('date')"
                    class="pr-5 pl-5  border-r border-t border-gray-300 cursor-pointer">Print</th>
                <th class="pr-5 pl-5  border-r border-t border-gray-300 cursor-pointer">Audit</th>
                <th class="pr-5 pl-5  border-r border-t border-gray-300 cursor-pointer">Auditee</th>
                <th class="pr-5 pl-5 border-r border-t border-gray-300 cursor-pointer">Created</th>
                <th class="pr-5 pl-5 border-r border-t border-gray-300 cursor-pointer">Perfom Audit</th>
                <th class="pr-5 pl-5 border-r border-t border-gray-300 cursor-pointer">Non Conformities</th>
                <th class="pr-5 pl-5  border-r border-t border-gray-300 cursor-pointer">Review Audit</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($audits as $audit)
                <td>{{ $loop->index + 1 }}</td>
                <td class="p-3 border border-r border-gray-50 text-center">
                    <a href=" {{ route('audit.edit', ['audit' => $audit->id, 'print' => true]) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-center" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                        </svg>
                    </a>
                </td>
                <td class="p-3 border border-r border-gray-50">{{ $audit->audit_name }}</td>
                <td class="p-3 border border-r border-gray-50">{{ $audit->audited->name }}</td>
                <td class="p-3 border border-r border-gray-50">{{ $audit->created_at }}</td>
                <td class="p-3 border border-r border-gray-50">
                    <a href="{{ route('audit.edit', $audit->id) }}">
                       Record Audit
                    </a>
                </td>
                <td class="p-3 border border-r border-gray-50">

                </td>
                <td class="p-3 border border-r border-gray-50">
                    <a href="{{ route('audit.review', $audit->id) }}">
                        Review
                    </a>
                </td>

                </tr>
            @endforeach



        </tbody>
    </table>
    <div class="pt-4">
        {{ $audits->links() }}
    </div>

</div>
