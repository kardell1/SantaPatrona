<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create("permissions", function (Blueprint $table) {
            $table->id();
            $table->string("module", 30);
            $table->string("resource", 30);
            $table->string("action", 50);
            $table->unique(["module", "resource", "action"]);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("permissions");
    }
};
