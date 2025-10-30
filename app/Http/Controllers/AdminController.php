<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Atividade;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $atividades = Atividade::where('status', 0)->get();

        return view('admin.dashboard', compact('atividades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $atividades = Atividade::where('id', $id)->get();

        return view('admin.edit', compact('atividades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status'            => 'required',
            'feedback_admin'    => 'required',
            'horas_declaradas'  => 'required'
        ]);

        try {
            $atividades = Atividade::findOrFail($id);
            $atividades->status = strtoupper($request->status);
            $atividades->feedback_admin = strtoupper($request->feedback_admin);
            $atividades->save();

            $usuario = User::findOrFail($atividades->usuario_id);
            $usuario->total_horas += $request->horas_declaradas;
            
            return redirect()->route('admin.index')->with('success', 'Avaliação realizado com sucesso!');

        } catch (\Exception $e) {
            return redirect()->route('admin.index')->with('failed', 'Falha ao atualizar a solicitação de horas complementares, verifique os dados e tente novamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
