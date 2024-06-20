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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->boolean('completado')->default(false);
            $table->unsignedBigInteger('dishes_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tables_id');

            $table->foreign('dishes_id')->references('id')->on('dishes');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('tables_id')->references('id')->on('tables');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
