<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create("menu_products", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->unsignedBigInteger('menu_category_id');
            $table->foreign('menu_category_id')->references('id')->on('menu_categories');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("menu_products");
    }
};
