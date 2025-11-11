<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atividade;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index(Request $request)
    {
        // Pega atividades pendentes, já carregando a info do usuário (aluno)
        $query = Atividade::with('usuario')->where('status', 'pendente');

        // Lógica do filtro de curso que você pediu
        if ($request->filled('curso')) {
            $query->whereHas('usuario', function ($q) use ($request) {
                $q->where('curso', $request->curso);
            });
        }

        $atividadesPendentes = $query->latest()->get();

        // Pega a lista de cursos que existem para preencher o <select> do filtro
        $cursos = User::where('role', 'aluno')
            ->distinct()
            ->pluck('curso')
            ->filter() // Remove nulos
            ->sort();

        return view('admin.dashboard', compact('atividadesPendentes', 'cursos'));
    }

    /**
     * Ação de Aprovar
     */
    public function aprovar(Atividade $atividade)
    {
        $user = User::where('id', $atividade->usuario_id)->first();
        $user->total_horas += $atividade->horas_declaradas;
        $user->update(['total_horas' => $user->total_horas]);

        $atividade->update(['status' => 'aprovado']);
        return back()->with('success', 'Atividade aprovada com sucesso.');
    }

    /**
     * Ação de Negar
     */
    public function negar(Atividade $atividade)
    {
        $atividade->update(['status' => 'negado']);
        return back()->with('success', 'Atividade negada com sucesso.');
    }
}
