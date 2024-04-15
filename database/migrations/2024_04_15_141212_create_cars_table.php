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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->timestamps();
        });

        Schema::create('models', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->unsignedInteger('brand_id');
            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->OnDelete('cascade');
            $table->timestamps();
        });

        Schema::create('colors', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->timestamps();
        });

        Schema::create('cars', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('model_id');
            $table->foreign('model_id')
                ->references('id')
                ->on('models')
                ->OnDelete('cascade');

            $table->unsignedInteger('color_id')->nullable();
            $table->foreign('color_id')
                ->references('id')
                ->on('colors')
                ->OnDelete('cascade');

            $table->year('year')->nullable();
            $table->unsignedInteger('kilometrage')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
        Schema::dropIfExists('colors');
        Schema::dropIfExists('models');
        Schema::dropIfExists('brands');
    }
};
