<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="items-center bg-gray-50 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            @if (Auth::user()->photo)
            <img src="{{ asset(Auth::user()->photo) }}" alt="Profile Photo" class="w-32 h-32 rounded-full">
        @endif
        </a>
        <div class="p-5">
            <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                <a href="#">{{ Auth::user()->name }}</a>
            </h3>
            <span class="text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</span>
            <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400">{{ Auth::user()->bio }}</p>
            <form action="{{ route('editProfile') }}">
                <button class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                    <span class="flex items-center px-3 py-2 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        <svg class="h-6 w-6 text-cyan-500 mr-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        <span>Edit Profile</span>
                    </span>
                </button>
                </span>
            </form>
        </div>
    </div> 
    <br>
   
</x-layout>
