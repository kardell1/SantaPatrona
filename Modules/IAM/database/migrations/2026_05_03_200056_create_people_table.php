<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create("people", function (Blueprint $table) {
            $table->id();
            $table->string("cellphone", 15)->unique();
            $table->string("email", 50)->unique();
            $table->string("name", 50);
            // $table->string("dni", 15)->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("people");
    }
};
