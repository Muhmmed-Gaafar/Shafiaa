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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('disability_type_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('organization_id')->nullable();
            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('set null');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
            $table->foreign('disability_type_id')->references('id')->on('disability_types')->onDelete('set null');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
