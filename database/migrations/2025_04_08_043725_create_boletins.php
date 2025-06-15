<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('boletins', function (Blueprint $table) {
        $table->id();
        
        $table->foreignId('aluno_id')->constrained('alunos')->onDelete('cascade');
        $table->foreignId('professor_id')->constrained('professores')->onDelete('cascade');
        $table->foreignId('materia_id')->constrained('materias')->onDelete('cascade');
        
        $table->string('semestre', 7);
        $table->decimal('nota', 4, 2);
        $table->timestamps();

        $table->unique(['aluno_id', 'professor_id', 'materia_id', 'semestre']);
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boletins');
    }
};
