<div class="flex w-full max-w-xs p-4 bg-white">
    <?php use App\Http\Controllers\IncidentController;?>
    <?php use App\Http\Controllers\DepartmentController;?>
    <ul class="flex flex-col w-full">
        <li class="my-px">
            <a href="{{action([IncidentController::class, 'index'])}}"
               class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 {{ (request()->is('incidents')) ? 'bg-gray-100' : '' }} ">
                <span class="flex items-center justify-center text-lg text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"  class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                      </svg>
                </span>
                <span class="ml-3">Incidents</span>
                <span class="flex items-center justify-center text-sm text-gray-500 font-semibold bg-gray-200 h-6 px-2 rounded-full ml-auto">3</span>
            </a>
        </li>

        <li class="my-px">
            <a href="{{action([DepartmentController::class, 'index'])}}"
               class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 hover:bg-gray-100 {{ (request()->is('department')) ? 'bg-gray-100' : '' }} ">
                <span class="flex items-center justify-center text-lg text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                      </svg>
                </span>
                <span class="ml-3">Departments</span>
            </a>
        </li>


        <li class="my-px">
            <a href="/"
               class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 hover:bg-gray-100">
                <span class="flex items-center justify-center text-lg text-green-400">
                    <svg fill="none"
                         stroke-linecap="round"
                         stroke-linejoin="round"
                         stroke-width="2"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         class="h-6 w-6">
                        <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </span>
                <span class="ml-3">Add new Incident</span>
            </a>
        </li>
        <li class="my-px">
            <span class="flex font-medium text-sm text-gray-400 px-4 my-4 uppercase">Account</span>
        </li>
        <li class="my-px">
            <a href="#"
               class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 hover:bg-gray-100">
                <span class="flex items-center justify-center text-lg text-gray-400">
                    <svg fill="none"
                         stroke-linecap="round"
                         stroke-linejoin="round"
                         stroke-width="2"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         class="h-6 w-6">
                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </span>
                <span class="ml-3">Profile</span>
            </a>
        </li>
        <li class="my-px">
            <a href="#"
               class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 hover:bg-gray-100">
                <span class="flex items-center justify-center text-lg text-gray-400">
                    <svg fill="none"
                         stroke-linecap="round"
                         stroke-linejoin="round"
                         stroke-width="2"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         class="h-6 w-6">
                        <path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                    </svg>
                </span>
                <span class="ml-3">Notifications</span>
                <span class="flex items-center justify-center text-sm text-gray-500 font-semibold bg-gray-200 h-6 px-2 rounded-full ml-auto">10</span>
            </a>
        </li>

        <li class="my-px">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
            <a href="#" onclick="event.preventDefault();
            this.closest('form').submit();"
               class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 hover:bg-gray-100">
                <span class="flex items-center justify-center text-lg text-red-400">
                    <svg fill="none"
                         stroke-linecap="round"
                         stroke-linejoin="round"
                         stroke-width="2"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         class="h-6 w-6">
                        <path d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"></path>
                    </svg>
                </span>
                <span class="ml-3">Logout</span>
            </a>
        </form>
        </li>
    </ul>
</div>
