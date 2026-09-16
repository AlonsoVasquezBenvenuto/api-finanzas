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
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id('id_movimiento');
            $table->foreignId('id_usuario')->constrained('usuarios', 'id_usuario');
            $table->foreignId('id_cuenta')->constrained('cuentas', 'id_cuenta');
            $table->foreignId('id_cuenta_destino')->nullable()->constrained('cuentas', 'id_cuenta');
            $table->foreignId('id_categoria')->nullable()->constrained('categorias', 'id_categoria');
            $table->foreignId('id_presupuesto')->nullable()->constrained('presupuestos', 'id_presupuesto');
            $table->string('tipo', 20);
            $table->decimal('monto', 14, 2);
            $table->decimal('tasa_cambio', 18, 8)->nullable();
            $table->timestamp('fecha');
            $table->text('descripcion')->nullable();
            $table->string('estado', 20);
            $table->string('visibilidad', 20);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimientos');
    }
};
