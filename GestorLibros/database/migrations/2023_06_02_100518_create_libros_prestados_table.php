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
        Schema::create('libros_prestados', function (Blueprint $table) {
            $table->unsignedBigInteger('id_libro');
            $table->unsignedBigInteger('id_usuario_presta');
            $table->unsignedBigInteger('id_usuario_prestado');
            $table->foreign("id_libro")
                  ->references("id")
                  ->on("libros")
                  ->onDelete("cascade")
                  ->onUpdate("cascade");
            $table->foreign("id_usuario_presta")
                  ->references("id")
                  ->on("users")
                  ->onDelete("cascade")
                  ->onUpdate("cascade");
            $table->foreign("id_usuario_prestado")
                  ->references("id")
                  ->on("users")
                  ->onDelete("cascade")
                  ->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros_prestados');
    }
};
