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
        Schema::create('pengembalians', function (Blueprint $table) {
            $table->increments('id_pengembalian');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('carmodel_id');
            $table->unsignedInteger('booking_id')->nullable();;
            $table->dateTime('tgl_kembali');
            $table->string('status_kembali')->default("belum kembali");
            $table->text('cek_kondisi')->nullable();
            $table->boolean('is_kembali')->default(false);
            $table->boolean('is_done')->default(false);
            // $table->boolean('is_approved')->default(false);
            // $table->boolean('is_kembali')->default(false);
            $table->timestamps();

            // Foreign Key
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('carmodel_id')->references('carmodel_id')->on('car_models')->onDelete('cascade');
            $table->foreign('booking_id')->references('booking_id')->on('bookings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalians');
    }
};
