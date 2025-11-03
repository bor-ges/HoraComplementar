@extends('layouts.app')
@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        {{-- SEÇÃO DA TABELA DE DADOS (DATA TABLE) --}}
        <h2 class="text-xl font-semibold mb-4 text-gray-900 dark:text-white">Solicitações de Horas Complementares</h2>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Tipo de Atividade</th>
                    <th>Data</th>
                    <th>Horas Contabilizadas</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($atividades as $atividade)
                    <tr>
                        <td>{{ $atividade->nome }}</td>
                        <td>{{ $atividade->tipo }}</td>
                        <td>{{ \Carbon\Carbon::parse($atividade->data_atividade)->format('d/m/Y') }}</td>
                        <td>{{ $atividade->horas_declaradas }}</td>
                        <td>
                            <a href="{{ route('admin.edit', $atividade->id) }}" class="text-blue-600 underline">Editar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        {{-- SEÇÃO DO FOOTER --}}
        <footer class="bg-white rounded-lg shadow m-4 dark:bg-gray-800 mt-8">
            <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-center">
                <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2025 <a href="#" class="hover:underline">TCC Sistemas de Informação</a>. Todos os Direitos Reservados.</span>

            </div>
        </footer>

    </div>
</div>

</body>
@endsection