<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseholdsTable extends Migration {
    public function up() {
        Schema::create('households', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('street');
            $table->string('house_no');
            $table->unsignedBigInteger('union_council_id');
            $table->foreign('union_council_id')->references('id')->on('union_councils');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('households');
    }
}
