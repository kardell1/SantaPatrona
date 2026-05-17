<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menu_inventories', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('menu_product_unit_id');
            //$table->foreign('menu_product_unit_id')->references('id')->on('menu_product_units');
            $table->boolean("is_priority")->default(false);
            $table->integer('amount');
            $table->string("manufacturing_cost");
            $table->date("adquisition_date");
            $table->date("reception_date");
            $table->date("expired_date");
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_inventories');
    }
};
