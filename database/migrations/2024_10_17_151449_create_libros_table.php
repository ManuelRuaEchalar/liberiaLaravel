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
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 100);
            $table->unsignedBigInteger('editorial_id'); // Clave foránea
            $table->tinyInteger('edicion');
            $table->string('pais', 150);
            $table->decimal('precio', 10, 2);
            $table->timestamps();

            // Establecer la clave foránea
            $table->foreign('editorial_id')->references('id')->on('editorials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};

