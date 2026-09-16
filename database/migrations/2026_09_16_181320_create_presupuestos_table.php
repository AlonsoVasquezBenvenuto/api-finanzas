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
        Schema::create('presupuestos', function (Blueprint $table) {
            $table->id('id_presupuesto');
            $table->foreignId('id_usuario')->constrained('usuarios', 'id_usuario')->cascadeOnDelete();
            $table->string('nombre', 150);
            $table->text('descripcion')->nullable();
            $table->decimal('monto_total', 14, 2);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('estado', 20);
            $table->string('visibilidad', 20);
            $table->timestamps();
            $table->timestamp('read_at')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presupuestos');
    }
};
