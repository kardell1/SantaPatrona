<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('menu_inventories', function (Blueprint $table) {
            $table->unsignedBigInteger('menu_product_unit_id');
            $table->foreign('menu_product_unit_id')->references('id')->on('menu_product_units');
        });
    }

    public function down(): void
    {
        Schema::table('menu_inventories', function (Blueprint $table) {});
    }
};
