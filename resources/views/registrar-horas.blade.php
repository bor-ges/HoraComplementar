{{-- resources/views/registrar-horas.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-14">
            {{-- Bloco de Erros --}}
            @if ($errors->any())
                <div class="p-4 mb-6 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <span class="font-medium">Ops! Encontramos alguns problemas:</span>
                    <ul class="mt-1.5 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Registrar Nova Atividade Complementar</h2>

                <form action="{{ route('atividades.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="activity_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome da Atividade/Curso</label>
                            <input type="text" name="nome" id="activity_name" value="{{ old('nome') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ex: Palestra sobre IA" required>
                        </div>
                        <div>
                            <label for="activity_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de Atividade</label>
                            <select id="activity_type" name="tipo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="" disabled {{ old('tipo') ? '' : 'selected' }}>Escolha um tipo</option>
                                <option value="palestra" {{ old('tipo') == 'palestra' ? 'selected' : '' }}>Palestra</option>
                                <option value="curso" {{ old('tipo') == 'curso' ? 'selected' : '' }}>Curso Online</option>
                                <option value="monitoria" {{ old('tipo') == 'monitoria' ? 'selected' : '' }}>Monitoria</option>
                                <option value="outro" {{ old('tipo') == 'outro' ? 'selected' : '' }}>Outro</option>
                            </select>
                        </div>
                        <div>
                            <label for="activity_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data de Conclusão</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4Z"/>
                                        <path d="M0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                </div>
                                <input datepicker datepicker-autohide datepicker-format="yyyy-mm-dd" type="text" name="data_atividade" id="activity_date" value="{{ old('data_atividade') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Selecione a data">
                            </div>
                        </div>
                        <div>
                            <label for="total_hours" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total de Horas</label>
                            <input type="number" name="horas_declaradas" id="total_hours" value="{{ old('horas_declaradas') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ex: 40" required>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descrição</label>
                        <textarea id="description" name="descricao" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Descreva a atividade...">{{ old('descricao') }}</textarea>
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="certificate_file">Anexar Certificado (PDF, JPG, PNG)</label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="certificado" id="certificate_file" type="file">
                    </div>

                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enviar Registro</button>
                </form>
            </div>
        </div>
    </div>
@endsection
