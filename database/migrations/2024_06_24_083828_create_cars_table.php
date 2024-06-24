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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->integer('year_of_issue');
            $table->integer('mileage');
            $table->string('color');
            $table->foreignId('car_brand_id')->index()->constrained('car_brands');
            $table->foreignId('car_model_id')->index()->constrained('car_models');
            $table->foreignId('user_id')->nullable()->index()->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
