<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('atividades', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'usuario_id')->constrained('users')->cascadeOnDelete();
            $table->string('nome');
            $table->string('tipo');
            $table->text('descricao')->nullable();
            $table->unsignedInteger('horas_declaradas');
            $table->date('data_atividade');
            $table->string('caminho_certificado');
            $table->enum('status', ['pendente', 'aprovado', 'reprovado'])->default('pendente');
            $table->text('feedback_admin')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('atividades');
    }
};
