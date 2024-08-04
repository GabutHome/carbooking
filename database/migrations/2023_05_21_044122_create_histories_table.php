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
        Schema::create('histories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('carmodel_id');
            $table->dateTime('tgl_booking');
            $table->dateTime('tgl_kembali');
            $table->boolean('is_approved')->default(false);
            $table->boolean('is_kembali')->default(false);
            $table->boolean('is_done')->default(false);
            $table->timestamps();

            // Foreign Key
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('carmodel_id')->references('carmodel_id')->on('car_models')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
