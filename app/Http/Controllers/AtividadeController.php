<?php

// app/Http/Controllers/AtividadeController.php

namespace App\Http\Controllers;

use App\Models\Atividade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SalvarAtividadeRequest; // Usar a nossa Request

class AtividadeController extends Controller
{
    /**
     * Exibe o dashboard principal com a lista de atividades do usuário.
     * Este método corresponde à view 'dashboard'.
     */
    public function index()
    {
        $usuario = Auth::user();
        $atividades = $usuario->atividades()->orderBy('data_atividade', 'desc')->get();

        $totalHorasAprovadas = $atividades->where('status', 'aprovado')->sum('horas_declaradas');
        $totalHorasNecessarias = 200; // Defina o total de horas do curso aqui
        $horasRestantes = max(0, $totalHorasNecessarias - $totalHorasAprovadas);

        $stats = [
            'totalRegistered' => $totalHorasAprovadas,
            'remaining' => $horasRestantes,
            'courseName' => 'Análise e Desenv. de Sistemas',
        ];

        return view('dashboard', [
            'activities' => $atividades, // Mantive o nome da variável em inglês para a view
            'stats' => $stats,
        ]);
    }

    /**
     * Mostra o formulário para criar uma nova atividade.
     * Este método corresponde à view 'registrar-horas'.
     */
    public function create()
    {
        return view('registrar-horas');
    }

    /**
     * Salva a nova atividade no banco de dados.
     */
    public function store(SalvarAtividadeRequest $request)
    {
        $dadosValidados = $request->validated();
        $caminho = $request->file('certificado')->store('certificados', 'public');

        Auth::user()->atividades()->create([
            'nome' => $dadosValidados['nome'],
            'tipo' => $dadosValidados['tipo'],
            'descricao' => $dadosValidados['descricao'],
            'horas_declaradas' => $dadosValidados['horas_declaradas'],
            'data_atividade' => $dadosValidados['data_atividade'],
            'caminho_certificado' => $caminho,
            'status' => 'pendente', // <-- Linha fundamental!
        ]);

        return redirect()->route('dashboard')->with('success', 'Atividade registrada com sucesso!');
    }

    /**
     * Exibe os detalhes de uma atividade específica.
     */
    public function show(Atividade $atividade)
    {
        // Garante que um usuário não possa ver a atividade de outro
        $this->authorize('view', $atividade);
        // (Você precisará criar uma Policy para isso funcionar, ou usar a verificação manual com Auth::id())

        return view('atividades.show', compact('atividade'));
    }

    /**
     * Método customizado para a galeria de certificados.
     * Este método corresponde à view 'meus-certificados'.
     */
    public function gallery()
    {
        $atividades = Auth::user()->atividades()->orderBy('data_atividade', 'desc')->get();
        return view('meus-certificados', ['activities' => $atividades]); // Mantendo 'activities' para a view
    }

    // MÉTODOS DE RESOURCE QUE PODEM SER IMPLEMENTADOS NO FUTURO
//    public function edit(Atividade $atividade) { /* TODO: Retornar view de edição */ }
//    public function update(Request $request, Atividade $atividade) { /* TODO: Lógica para atualizar */ }
//    public function destroy(Atividade $atividade) { /* TODO: Lógica para deletar */ }
}
