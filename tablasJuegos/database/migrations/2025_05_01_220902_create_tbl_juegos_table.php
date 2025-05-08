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
        Schema::create('tbl_juegos', function (Blueprint $table) {
            $table->id('juegosId');
            $table->string('titulo',150);
            $table->text('descripcion');
            $table->decimal('precio', 8, 2);
            $table->integer('cantidad_dispo');
            $table->string('imagen');
            $table->integer('plataformaId');
            $table->foreign('plataformaId')->references('plataformaId')->on('tbl_plataformas')->onDelete('cascade');
            $table->integer('generoId');
            $table->foreign('generoId')->references('categoriaId')->on('tbl_categorias')->onDelete('cascade');
            $table->integer('proveedorId');
            $table->foreign('proveedorId')->references('proveedorId')->on('tbl_proveedores')->onDelete('cascade');
      
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_juegos');
    }


};
