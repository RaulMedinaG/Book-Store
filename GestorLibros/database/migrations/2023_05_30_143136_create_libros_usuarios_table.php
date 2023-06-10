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
        Schema::create('libros_usuarios', function (Blueprint $table) {
            $table->unsignedBigInteger('id_libro');
            $table->unsignedBigInteger('id_usuario');
            $table->string('estado');
            $table->string('leido');
            $table->integer('valoracion');
            $table->foreign("id_libro")
                  ->references("id")
                  ->on("libros")
                  ->onDelete("cascade")
                  ->onUpdate("cascade");
            $table->foreign("id_usuario")
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
        Schema::dropIfExists('libros_usuarios');
    }
};
