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
        Schema::create('loging_log', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->ipAddress();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loging_log');
    }
};
