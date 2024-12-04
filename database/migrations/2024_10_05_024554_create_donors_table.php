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
        Schema::create('donors', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('name'); 
            $table->date('fecha_nacimiento'); 
            $table->string('tipo_sangre', 3); 
            $table->enum('genero', ['Masculino', 'Femenino']); 
            $table->text('historial_medico'); 
            $table->string('avatar')->nullable();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donors');
    }
};
