<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('people');
            $table->string('name')->unique(); // nombre de la marca
            $table->string('description')->nullable();
            $table->boolean('isActive')->default(true);// para saber si esta activa aun
            $table->string('path')->nullable(); // path del logo de esa marca , para tener una imagen
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
