<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('maestros', function (Blueprint $table) {
            $table->id('id_maestro');
            $table->string('nombre');
            $table->enum('elemento', ['agua', 'tierra', 'fuego', 'aire']);
            $table->string('nacion');
            $table->integer('nivel_poder')->default(1); // 1-10
            $table->string('tecnica_especial')->nullable();
            $table->boolean('es_avatar')->default(false);
            $table->integer('edad')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('maestros');
    }
};
