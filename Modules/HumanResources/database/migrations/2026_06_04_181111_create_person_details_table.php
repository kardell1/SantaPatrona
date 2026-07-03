<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('person_details', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('person_id');
            $table->foreign('person_id')->references('id')->on('people');
            // carnet  - nit , etc
            $table->string('identifier_type');
            // numero
            $table->string('identifier_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('person_details');
    }
};
