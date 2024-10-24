<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestGroupMembersTable extends Migration
{
    public function up()
    {
        Schema::create('guest_group_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guest_group_id')->constrained('guest_groups')->onDelete('cascade');
            $table->foreignId('guest_id')->constrained('guests')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('guest_group_members');
    }
}
