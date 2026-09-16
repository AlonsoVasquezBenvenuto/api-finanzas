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
        Schema::create('auditorias', function (Blueprint $table) {
            $table->id('id_auditoria');
            $table->foreignId('id_usuario')->nullable()->constrained('usuarios', 'id_usuario')->nullOnDelete();
            $table->string('evento', 100);
            $table->string('entidad_tipo', 50);
            $table->unsignedBigInteger('entidad_id');
            $table->text('datos_anteriores')->nullable();
            $table->text('datos_nuevos')->nullable();
            $table->string('ip', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auditorias');
    }
};
