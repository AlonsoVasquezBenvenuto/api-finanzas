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
        Schema::create('presupuesto_items', function (Blueprint $table) {
            $table->id('id_presupuesto_item');
            $table->foreignId('id_presupuesto')->constrained('presupuestos', 'id_presupuesto')->cascadeOnDelete();
            $table->foreignId('id_categoria')->constrained('categorias', 'id_categoria');
            $table->decimal('monto_asignado', 14, 2);
            $table->decimal('monto_ejecutado', 14, 2);
            $table->timestamps();

            $table->unique(['id_presupuesto', 'id_categoria']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presupuesto_items');
    }
};
