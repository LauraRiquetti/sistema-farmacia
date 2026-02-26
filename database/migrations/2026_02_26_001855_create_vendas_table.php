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
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained()->onDelete('cascade');
            $table->foreignId('produto_id')->constrained()->onDelete('cascade');
            $table->decimal('valor');
            $table->enum('pagemento', ['debito', 'credito', 'pix']);
            $table->enum('status', ['aguardando_confirmacao', 'separando', 'saiu_para_entrega', 'entregue']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendas');
    }
};
