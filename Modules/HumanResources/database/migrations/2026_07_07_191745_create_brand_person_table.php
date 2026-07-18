<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('brand_person', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('person_id');
            $table->foreign('person_id')->references('id')->on('people');

            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('brand_person');
    }
};
