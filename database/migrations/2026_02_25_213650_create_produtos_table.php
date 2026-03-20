<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('quantidade')->default(50); // Coloquei um padrão de 50 itens no estoque
            $table->decimal('valor', 8, 2); // 'valor', exatamente como no Controller
            $table->string('categoria')->nullable(); // NOVA COLUNA
            $table->text('imagem')->nullable(); // NOVA COLUNA
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};