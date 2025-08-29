<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Certificados - Horas Complementares</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body class="bg-gray-50 dark:bg-gray-900">

{{-- Cole aqui o código da sua <nav> e <aside> do dashboard, lembrando de mudar o item ativo da sidebar para "Meus Certificados" --}}
{{-- Exemplo da alteração na sidebar: --}}
{{-- <li> <a href="{{ route('meus.certificados') }}" class="... bg-gray-100 dark:bg-gray-700 ..."> ... </a> </li> --}}


<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Meus Certificados Enviados</h2>

        {{-- GRID DE CERTIFICADOS --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            {{-- Exemplo de Card 1 (Aprovado) --}}
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    {{-- Use uma imagem real do certificado aqui --}}
                    <img class="rounded-t-lg" src="https://placehold.co/600x400/e2e8f0/e2e8f0" alt="placeholder de certificado" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">Palestra sobre Inteligência Artificial</h5>
                    </a>
                    <div class="flex justify-between items-center mb-4">
                        <p class="text-sm text-gray-700 dark:text-gray-400">10 Horas</p>
                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Aprovado</span>
                    </div>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Ver Detalhes
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/></svg>
                    </a>
                </div>
            </div>

            {{-- Exemplo de Card 2 (Pendente) --}}
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg" src="https://placehold.co/600x400/e2e8f0/e2e8f0" alt="placeholder de certificado" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">Curso Online de AWS</h5>
                    </a>
                    <div class="flex justify-between items-center mb-4">
                        <p class="text-sm text-gray-700 dark:text-gray-400">40 Horas</p>
                        <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Pendente</span>
                    </div>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Ver Detalhes
                    </a>
                </div>
            </div>

            {{-- Exemplo de Card 3 (Reprovado) --}}
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg" src="https://placehold.co/600x400/e2e8f0/e2e8f0" alt="placeholder de certificado" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">Monitoria de Programação</h5>
                    </a>
                    <div class="flex justify-between items-center mb-4">
                        <p class="text-sm text-gray-700 dark:text-gray-400">30 Horas</p>
                        <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Reprovado</span>
                    </div>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Ver Detalhes
                    </a>
                </div>
            </div>

            {{-- Você pode repetir os cards com um @foreach do Laravel --}}

        </div>
    </div>
</div>

</body>
</html>
