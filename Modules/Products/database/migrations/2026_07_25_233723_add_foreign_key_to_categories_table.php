<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->unsignedBigInteger('unit_type_id'); // unidad de venta
            $table->foreign('unit_type_id')->references('id')->on('unit_types');
        });
    }

    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {

        });
    }
};
