{{-- resources/views/admin/dashboard.blade.php --}}
@extends('layouts.app') {{-- Reutilizando seu layout principal --}}

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h2 class="text-2xl font-semibold mb-4">Aprovar Horas Complementares</h2>

                    @if (session('success'))
                        <div class="mb-4 text-green-600 dark:text-green-400">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="GET" action="{{ route('admin.dashboard') }}" class="mb-6">
                        <label for="curso" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Filtrar por Curso:</label>
                        <div class="flex space-x-2">
                            <select name="curso" id="curso" class="block w-1/3 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                <option value="">Todos os Cursos</option>
                                @foreach($cursos as $curso)
                                    <option value="{{ $curso }}" {{ request('curso') == $curso ? 'selected' : '' }}>
                                        {{ $curso }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500">Filtrar</button>
                        </div>
                    </form>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Aluno</th>
                                <th scope="col" class="px-6 py-3">Curso</th>
                                <th scope="col" class="px-6 py-3">Descrição</th>
                                <th scope="col" class="px-6 py-3">Horas</th>
                                <th scope="col" class="px-6 py-3">Comprovante</th>
                                <th scope="col" class="px-6 py-3">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($atividadesPendentes as $atividade)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4">{{ $atividade->user->name }}</td>
                                    <td class="px-6 py-4">{{ $atividade->user->curso ?? 'N/I' }}</td>
                                    <td class="px-6 py-4">{{ $atividade->descricao }}</td>
                                    <td class="px-6 py-4">{{ $atividade->horas_gastas }}</td>
                                    <td class="px-6 py-4">
                                        {{-- Garante que o link de storage funcione --}}
                                        <a href="{{ Storage::url($atividade->arquivo_comprovante) }}" target="_blank" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            Ver Arquivo
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 flex space-x-2">
                                        <form method="POST" action="{{ route('admin.atividades.aprovar', $atividade) }}">
                                            @csrf
                                            <button type="submit" class="font-medium text-green-600 dark:text-green-500 hover:underline">Aprovar</button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.atividades.negar', $atividade) }}">
                                            @csrf
                                            <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Negar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center">Nenhuma atividade pendente.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
