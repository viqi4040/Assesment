<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseholdMembersTable extends Migration {
    public function up() {
        Schema::create('household_members', function (Blueprint $table) {
            $table->id();
			$table->string('name');
			$table->string('member_age');
			$table->string('marital_status');
            $table->unsignedBigInteger('household_id');
            $table->foreign('household_id')->references('id')->on('households');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('household_members');
    }
}

