<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sizes', function (Blueprint $table) {
            $table->id();
            $table->string('size');
            $table->string('description')->nullable();
            $table->string('size_system'); // sistema de tallaje que se usa , referente a continentes
            $table->enum('gender' , ['female', 'male' , 'both']);
            $table->unsignedBigInteger('equivalence_id')->nullable();
            $table->foreign('equivalence_id')->references('id')->on('sizes');
            $table->unique(['size', 'size_system' , 'gender' ]);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sizes');
    }
};
