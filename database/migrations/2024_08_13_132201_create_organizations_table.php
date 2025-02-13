<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable  extends Migration
{
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('api_key')->nullable();
            $table->string('web_key')->nullable();
            $table->string('name', 191)->nullable();
            $table->string('licence_number')->nullable();
            $table->string('phone')->nullable();
            $table->string('email', 191)->nullable();
            $table->string('address', 191)->nullable();
            $table->string('manager_name')->nullable();
            $table->string('manager_phone')->nullable();
            $table->string('manager_email', 191)->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null')->onUpdate('cascade');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null')->onUpdate('cascade');
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('organizations');
    }
}

