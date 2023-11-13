<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration {
    public function up() {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            // You might want to add more fields based on your needs, such as description, permissions, etc.
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('roles');
    }
}
