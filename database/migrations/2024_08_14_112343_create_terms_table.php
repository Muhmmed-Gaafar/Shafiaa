<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermsTable extends Migration
{
    public function up()
    {
        Schema::create('terms', function (Blueprint $table) {
            $table->id();
            $table->timestamp('timestamp');
            $table->string('type')->nullable();
            $table->integer('order')->nullable();
            $table->unsignedBigInteger('curriculum_id')->nullable();
            $table->unsignedBigInteger('disability_type_id')->nullable();
            $table->foreign('curriculum_id')->references('id')->on('curriculums')->onDelete('cascade');
            $table->foreign('disability_type_id')->references('id')->on('disability_types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('terms');
    }
}

