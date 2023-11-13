<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnionCouncilsTable extends Migration {
    public function up() {
        Schema::create('union_councils', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->unsignedBigInteger('tehsil_id');
			$table->foreign('tehsil_id')->references('id')->on('tehsils');
			$table->timestamps();
		});
    }

    public function down() {
        Schema::dropIfExists('union_councils');
    }
}

