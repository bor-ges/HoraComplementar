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
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 py-6">
            @foreach ($activities as $atividade)
                <div class="bg-white shadow rounded-lg overflow-hidden flex flex-col">
                    <div class="px-6 py-4">
                        <h3 class="font-semibold text-lg mb-2">{{ $atividade->nome }}</h3>
                        <p class="text-sm text-gray-600 mb-1">Tipo: {{ $atividade->tipo }}</p>
                        <p class="text-sm text-gray-600 mb-1">Data: {{ \Carbon\Carbon::parse($atividade->data_atividade)->format('d/m/Y') }}</p>
                        <p class="text-sm text-gray-600 mb-1">Horas: {{ $atividade->horas_declaradas }}</p>
                        <span class="inline-block px-3 py-1 text-xs font-bold rounded
                    @if($atividade->status == 'aprovado') bg-green-100 text-green-700
                    @elseif($atividade->status == 'pendente') bg-yellow-100 text-yellow-700
                    @else bg-red-100 text-red-700 @endif">
                    {{ ucfirst($atividade->status) }}
                </span>
                    </div>
                    <div class="px-6 py-2 border-t flex justify-between items-center">
                        @if($atividade->caminho_certificado)
                            <a href="{{ asset('storage/' . $atividade->caminho_certificado) }}" target="_blank" class="text-blue-600 hover:underline text-sm">Ver Certificado</a>
                        @else
                            <span class="text-gray-500 text-sm">Não enviado</span>
                        @endif
                        <a href="{{ route('atividades.show', $atividade->id) }}" class="text-indigo-600 hover:underline text-sm">Detalhes</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

</body>
</html>
