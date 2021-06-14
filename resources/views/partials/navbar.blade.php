<header class="px-40 bg-white flex flex-wrap items-center py-6 shadow-md">
    <div class="flex-1 flex justify-between items-center">
        <a href="/" class="text-xl">
            Task Management System
        </a>
    </div>

    <div>
        <nav class="flex items-center justify-between text-base text-gray-700">
            <div class="dropdown inline-block relative mr-20">
                <button class="bg-blue-600  text-white font-semibold py-2 px-4 rounded inline-flex items-center">
                    <span class="mr-1">Projects</span>
                    <svg class="fill-current h-4 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                    </svg>
                </button>
                <ul class="dropdown-menu absolute hidden text-white pt-2 ">
                    @foreach ($projects as $project)
                        <li>
                            <a class="rounded-t bg-blue-500 hover:bg-blue-700 py-2 px-4 block whitespace-no-wrap"
                                href="{{ route('project.home', $project->id) }}">{{ $project->title }}</a>
                        </li>
                    @endforeach

                </ul>
            </div>
            <a href="{{ route('project.create') }}"
                class="bg-green-600 hover:bg-green-800 text-white font-bold py-2 px-4 rounded mr-4 shadow">Create a
                Project
            </a>
        </nav>
    </div>
</header>
