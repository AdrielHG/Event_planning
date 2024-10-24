<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftReservationsTable extends Migration
{
    public function up()
    {
        Schema::create('gift_reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guest_id')->constrained('guests')->onDelete('cascade');
            $table->foreignId('gift_id')->constrained('gifts')->onDelete('cascade');
            $table->integer('reserved_quantity')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gift_reservations');
    }
}
