<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            {{-- Link para o Dashboard --}}
            <li>
                <a href="{{ route('dashboard') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('dashboard') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.026V10h8.975a1 1 0 0 0 1-.934A8.5 8.5 0 0 0 12.5 0Z"/>
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>

            {{-- Link para Registrar Horas --}}
            <li>
                <a href="{{ route('registrar-horas') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('registrar-horas') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M.998 10.333a1 1 0 0 1 0-1.414L2.41 7.505a1 1 0 0 1 1.414 0l.707.707a1 1 0 0 0 1.414 0l.707-.707a1 1 0 0 1 1.414 0l.707.707a1 1 0 0 0 1.414 0l.707-.707a1 1 0 0 1 1.414 0l.707.707a1 1 0 0 0 1.414 0l.707-.707a1 1 0 0 1 1.414 0l1.412 1.412a1 1 0 0 1 0 1.414l-1.412 1.412a1 1 0 0 1-1.414 0l-.707-.707a1 1 0 0 0-1.414 0l-.707.707a1 1 0 0 1-1.414 0l-.707-.707a1 1 0 0 0-1.414 0l-.707.707a1 1 0 0 1-1.414 0l-.707-.707a1 1 0 0 0-1.414 0l-.707.707a1 1 0 0 1-1.414 0L.998 10.333Z"/>
                        <path d="M10 12a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
                        <path d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16ZM0 10a10 10 0 1 1 20 0 10 10 0 0 1-20 0Z"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Registro de Horas</span>
                </a>
            </li>

            {{-- Link para Meus Certificados --}}
            <li>
                <a href="{{ route('meus-certificados') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('meus-certificados') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                        <path d="M16 14V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 0 0 0-2h-1v-2a2 2 0 0 0 2-2ZM4 2h2v12H4V2Zm8 16H3a1 1 0 0 1 0-2h9v2Z"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Meus Certificados</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
