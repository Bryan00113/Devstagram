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
        // Es necesario escribir este codigo siempre que se crea las migraciones aqui para poder agregar campos a la tabla o a la hora de correr php artisan migrate
        Schema::table('users', function (Blueprint $table) {
            //Aqui nos estamos asegurando de que el user name sea unico no es necesario en las nuevas versiones de laravel y despues de esto devemos hacer un php artisan  rolback  <luego migrate:refresh 
            $table->string('username')->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Es necesario escribir este codigo siempre que se crea las migraciones aqui para eliminar campos de la tabla o ala hora de utilizar php artisan migrate:rollback
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
        });
    }
};
