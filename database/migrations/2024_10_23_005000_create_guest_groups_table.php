<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestGroupsTable extends Migration
{
    public function up()
    {
        Schema::create('guest_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('events')->onDelete('cascade');
            $table->string('group_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('guest_groups');
    }
}
