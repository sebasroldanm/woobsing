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
        Schema::table('users', function (Blueprint $table) {
            $table->string('lastname')->after('name')->nullable();
            $table->string('phone')->after('lastname')->nullable();
            $table->unsignedBigInteger('role_id')->nullable();

            // Relación de Rol
            $table->foreign('role_id')
                    ->references('id')
                    ->on('roles');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('lastname');
            $table->dropColumn('phone');
        });
    }
};
