    <?php use App\Http\Controllers\IncidentController; ?>
    <?php use App\Http\Controllers\DepartmentController; ?>
    <?php use App\Http\Controllers\InsightController; ?>
    <?php use App\Http\Controllers\ChecklistController; ?>
    <?php use App\Http\Controllers\AuditController; ?>
    <?php use App\Http\Controllers\UserController; ?>
    <?php use App\Models\Incident; ?>
    <?php use App\Models\Checklist; ?>
    <?php use App\Models\Audit; ?>
    <div class=" bg-white dark:bg-gray-800 border-r  border-gray-100 border-opacity-90 h-full "
        @click.away="open = false" x-data="{ open: false }">
        <div class="flex-shrink-0 px-3 py-1 flex flex-row items-center justify-between">
            <a href="#"
                class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">
                Hi, {{ Str::of(Auth::user()->name)->explode(' ')[0] }} <br />

            </a>
            <button class="rounded-lg md:hidden rounded-lg focus:outline-none focus:shadow-outline"
                @click="open = !open">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path x-show="!open" fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <div class="flex flex-col sm:w-full sm:flex-row sm:justify-around md:block"
            :class="{'block': open, 'hidden': !open}">
            <div class="md:w-72 w-full ">
                <nav class=" ">
                    <a class="hover:text-gray-800 text-gray-600 bg-gray-50 dark:bg-gray-600 dark:text-gray-400hover:bg-gray-100 flex items-center p-2 my-6 transition-colors dark:hover:text-white dark:hover:bg-gray-600 duration-200 justify-start"
                        href="#">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 2048 1792"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill="#5e72e4"
                                d="M1024 1131q0-64-9-117.5t-29.5-103-60.5-78-97-28.5q-6 4-30 18t-37.5 21.5-35.5 17.5-43 14.5-42 4.5-42-4.5-43-14.5-35.5-17.5-37.5-21.5-30-18q-57 0-97 28.5t-60.5 78-29.5 103-9 117.5 37 106.5 91 42.5h512q54 0 91-42.5t37-106.5zm-157-520q0-94-66.5-160.5t-160.5-66.5-160.5 66.5-66.5 160.5 66.5 160.5 160.5 66.5 160.5-66.5 66.5-160.5zm925 509v-64q0-14-9-23t-23-9h-576q-14 0-23 9t-9 23v64q0 14 9 23t23 9h576q14 0 23-9t9-23zm0-260v-56q0-15-10.5-25.5t-25.5-10.5h-568q-15 0-25.5 10.5t-10.5 25.5v56q0 15 10.5 25.5t25.5 10.5h568q15 0 25.5-10.5t10.5-25.5zm0-252v-64q0-14-9-23t-23-9h-576q-14 0-23 9t-9 23v64q0 14 9 23t23 9h576q14 0 23-9t9-23zm256-320v1216q0 66-47 113t-113 47h-352v-96q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v96h-768v-96q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v96h-352q-66 0-113-47t-47-113v-1216q0-66 47-113t113-47h1728q66 0 113 47t47 113z">
                            </path>
                        </svg>
                        <span class="mx-4 text-md font-normal">
                            Dashboard
                        </span>
                    </a>
                    <div>
                        <p class="sidebar-header">
                            Incidents Managment
                        </p>
                        <a class="sidebar-item {{ request()->is('incidents') ? 'bg-gray-100' : '' }}"
                            href="{{ action([IncidentController::class, 'index']) }}">
                            <span class="text-left">
                                <svg class="h-6 w-6" viewBox="0 0 64 64" width="512"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="Filled_Outline" data-name="Filled Outline">
                                        <circle cx="21" cy="12" fill="#36474f" r="9" />
                                        <path d="m10 46h22v12h-22z" fill="#bbdefb" />
                                        <path
                                            d="m39 48v-16a9 9 0 0 0 -9-9h-2.08a12.972 12.972 0 0 1 -13.84 0h-2.08a9 9 0 0 0 -9 9v12a4 4 0 0 0 4 4z"
                                            fill="#bbdefb" />
                                        <path d="m26 48h-8l-11.86-22.82a8.92 8.92 0 0 1 5.86-2.18h1z" fill="#e0e0e0" />
                                        <path
                                            d="m48 61a20.877 20.877 0 0 1 -13-19.156v-11.844a36.076 36.076 0 0 0 13-4 36.07 36.07 0 0 0 13 4v11.844a20.877 20.877 0 0 1 -13 19.156z"
                                            fill="#ffd54f" />
                                        <path
                                            d="m48 26v35a20.877 20.877 0 0 0 13-19.156v-11.844a36.07 36.07 0 0 1 -13-4z"
                                            fill="#ffc108" />
                                        <path
                                            d="m21 22a10 10 0 1 0 -10-10 10.011 10.011 0 0 0 10 10zm0-18a8 8 0 1 1 -8 8 8.009 8.009 0 0 1 8-8z" />
                                        <path d="m20 29h2v2h-2z" />
                                        <path
                                            d="m61.109 29.006a34.916 34.916 0 0 1 -12.639-3.889 1 1 0 0 0 -.94 0 34.916 34.916 0 0 1 -12.639 3.889 1 1 0 0 0 -.891.994v11.845a21.816 21.816 0 0 0 13.615 20.078 1 1 0 0 0 .77 0 21.816 21.816 0 0 0 13.615-20.078v-11.845a1 1 0 0 0 -.891-.994zm-1.109 12.839a19.805 19.805 0 0 1 -12 18.067 19.805 19.805 0 0 1 -12-18.067v-10.96a36.882 36.882 0 0 0 12-3.756 36.874 36.874 0 0 0 12 3.756z" />
                                        <path
                                            d="m39.618 41.2-1.418 1.417 6 6a1 1 0 0 0 1.414 0l12-12-1.414-1.417-11.289 11.3z" />
                                        <path
                                            d="m27 39h-4.553l-7.478-14.38a14.22 14.22 0 0 0 13.231-.62h1.8a7.958 7.958 0 0 1 5.992 2.739c.749-.114 1.49-.258 2.225-.422a9.984 9.984 0 0 0 -8.217-4.317h-2.08a1.008 1.008 0 0 0 -.534.154 12.159 12.159 0 0 1 -12.772 0 1.008 1.008 0 0 0 -.534-.154h-2.08a10.011 10.011 0 0 0 -10 10v12a5.006 5.006 0 0 0 5 5h3v9h2v-9h15a5 5 0 0 0 0-10zm-20 8a3 3 0 0 1 -3-3v-12a7.958 7.958 0 0 1 1.88-5.141l6.313 12.141h-2.193v2h3.233l3.12 6zm11.607 0-11.2-21.539a7.945 7.945 0 0 1 4.593-1.461h.393l11.96 23zm8.393 0h-.393l-3.12-6h3.513a3 3 0 0 1 0 6z" />
                                    </g>
                                </svg>
                            </span>
                            <span class="mx-4 text-md font-normal">
                                Incidents
                            </span>
                            <span class="flex-grow text-right">
                                <button type="button" class="w-6 h-6 text-xs  rounded-full text-white bg-red-500">
                                    <span class="p-1">
                                        {{ Incident::where('finalized', 0)->where('assigned_to_email', Auth::user()->email)->count() }}
                                    </span>
                                </button>
                            </span>
                        </a>

                    </div>
      @if (Auth::user()->account_type == 'osh')
                    <div>
                        <p class="sidebar-header">
                            Application Settings
                        </p>
                        <a class="sidebar-item {{ request()->is('factor') ? 'bg-gray-100' : '' }}" href="/factor">
                            <span class="text-left">

                            </span>
                            <span class="mx-4 text-md font-normal">
                                Incident Factors
                            </span>

                        </a>
                    </div>

                        <div>
                            <p class="sidebar-header">
                                Accounts
                            </p>
                            <a class="sidebar-item {{ request()->is('department') ? 'bg-gray-100' : '' }}"
                                href="{{ action([DepartmentController::class, 'index']) }}">
                                <span class="text-left">
                                    <svg class="h-6 w-6" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                        <defs>
                                            <style>
                                                .cls-1 {
                                                    fill: #101820;
                                                }

                                            </style>
                                        </defs>
                                        <title />
                                        <g data-name="Layer 20" id="Layer_20">
                                            <path class="cls-1"
                                                d="M16,22a6,6,0,1,1,6-6A6,6,0,0,1,16,22Zm0-10a4,4,0,1,0,4,4A4,4,0,0,0,16,12Z" />
                                            <path class="cls-1"
                                                d="M21,31H11a4,4,0,0,1-4-4V24.45a1,1,0,0,1,.63-.92l3.64-1.46A1,1,0,1,1,12,23.93l-3,1.2V27a2,2,0,0,0,2,2H21a2,2,0,0,0,2-2V25.13l-3-1.2a1,1,0,0,1,.74-1.86l3.64,1.46a1,1,0,0,1,.63.92V27A4,4,0,0,1,21,31Z" />
                                            <path class="cls-1"
                                                d="M9,11a5,5,0,1,1,5-5A5,5,0,0,1,9,11ZM9,3a3,3,0,1,0,3,3A3,3,0,0,0,9,3Z" />
                                            <path class="cls-1"
                                                d="M8,19.39H5a4,4,0,0,1-4-4V13.64a1,1,0,0,1,.63-.93l3.19-1.25A1,1,0,0,1,6.11,12a1,1,0,0,1-.56,1.3L3,14.32v1.07a2,2,0,0,0,2,2H8a1,1,0,0,1,0,2Z" />
                                            <path class="cls-1"
                                                d="M23,11a5,5,0,1,1,5-5A5,5,0,0,1,23,11Zm0-8a3,3,0,1,0,3,3A3,3,0,0,0,23,3Z" />
                                            <path class="cls-1"
                                                d="M27,19.39H24a1,1,0,0,1,0-2h3a2,2,0,0,0,2-2V14.32l-2.55-1a1,1,0,0,1-.56-1.3,1,1,0,0,1,1.29-.57l3.19,1.25a1,1,0,0,1,.63.93v1.75A4,4,0,0,1,27,19.39Z" />
                                        </g>
                                    </svg>
                                </span>
                                <span class="mx-4 text-md font-normal">
                                    Departments
                                </span>

                            </a>
                            <a class="sidebar-item {{ request()->is('users') ? 'bg-gray-100' : '' }}"
                                href="{{ action([UserController::class, 'index']) }}">
                                <span class="text-left">
                                    <svg class="h-6 w-6" viewBox="0 0 24 24" width="24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" fill="none" stroke="#000"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                        <circle cx="8.5" cy="7" fill="none" r="4" stroke="#000" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" />
                                        <line fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" x1="20" x2="20" y1="8" y2="14" />
                                        <line fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" x1="23" x2="17" y1="11" y2="11" />
                                    </svg>
                                </span>
                                <span class="mx-4 text-md font-normal">
                                    User Managment
                                </span>

                            </a>


                        </div>
                    @endif


                </nav>
            </div>
        </div>
    </div>
