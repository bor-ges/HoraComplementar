@extends('layouts.app')
@section('title', 'Meus Certificados')
@section('content')
    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

        <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Meus Certificados Enviados</h2>

        {{-- Grid de Certificados --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

            {{-- Loop para cada atividade, ou mostra mensagem se estiver vazio --}}
            @forelse ($atividades as $atividade)
                <div class="bg-white dark:bg-gray-900 shadow-lg rounded-lg overflow-hidden flex flex-col">

                    {{-- Corpo do Card --}}
                    <div class="p-6 flex-grow">
                        <h3 class="font-semibold text-lg mb-2 text-gray-900 dark:text-white">
                            {{-- Usamos a descrição como título, pois 'nome' não existe na tabela --}}
                            {{ $atividade->descricao }}
                        </h3>

                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">
                            Tipo: {{ $atividade->tipo }}
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">
                            Horas: {{ $atividade->horas_declaradas }}
                        </p>

                        {{-- Badge de Status (com cores para dark mode) --}}
                        <span class_commented_out="inline-block px-3 py-1 text-xs font-bold rounded
                            @if($atividade->status == 'aprovado')
                                bg-green-100 text-green-700 dark:bg-green-900 dark:text-green-300
                            @elseif($atividade->status == 'negado')
                                bg-red-100 text-red-700 dark:bg-red-900 dark:text-red-300
                            @else
                                bg-yellow-100 text-yellow-700 dark:bg-yellow-900 dark:text-yellow-300
                            @endif
                        ">
                            {{ ucfirst($atividade->status) }}
                        </span>
                    </div>

                    {{-- Rodapé do Card --}}
                    <div class="px-6 py-4 bg-gray-50 dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 flex justify-between items-center">
                        @if($atividade->caminho_certificado)
                            {{-- Usamos Storage::url() para pegar o link público do arquivo --}}
                            <a href="{{ Storage::url($atividade->caminho_certificado) }}" target="_blank" class="text-blue-600 dark:text-blue-400 hover:underline text-sm font-medium">
                                Ver Certificado
                            </a>
                        @else
                            <span class="text-gray-500 text-sm">Sem anexo</span>
                        @endif

                        {{-- Link para a página de detalhes (atividades.show) --}}
                        <a href="{{ route('atividades.show', $atividade->id) }}" class="text-indigo-600 dark:text-indigo-400 hover:underline text-sm font-medium">
                            Detalhes
                        </a>
                    </div>
                </div>

            @empty
                {{-- Mensagem caso o aluno não tenha enviado nada --}}
                <div class="col-span-1 md:col-span-3 text-center text-gray-500 dark:text-gray-400 py-10">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h14a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2z" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">Nenhum certificado</h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Você ainda não enviou nenhum certificado.</p>
                </div>
            @endforelse

        </div>
    </div>
@endsection
