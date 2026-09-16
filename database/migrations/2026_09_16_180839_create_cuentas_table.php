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
        Schema::create('cuentas', function (Blueprint $table) {
            $table->id('id_cuenta');
            $table->foreignId('id_usuario')->constrained('usuarios', 'id_usuario')->cascadeOnDelete();
            $table->string('nombre', 150);
            $table->string('tipo', 30);
            $table->string('moneda', 3);
            $table->decimal('saldo_inicial', 14, 2);
            $table->decimal('saldo_actual', 14, 2);
            $table->string('visibilidad', 20);
            $table->string('estado', 20);
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
        Schema::dropIfExists('cuentas');
    }
};
