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
            // la variante agregada
            $table->unsignedBigInteger('menu_product_variant_id');
            $table->foreign('menu_product_variant_id')->references('id')->on('menu_product_variants');
            // costo de produccion
            $table->decimal('manufacturing_cost');
            // cantidad vigente en inventario
            $table->integer('amount');
            $table->date('reception_date');
            $table->date('expired_date');
            // empleado que lo ha creado
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees');
            // es el sabor del item en el inventario
            $table->unsignedBigInteger('menu_flavor_id')->nullable();
            $table->foreign('menu_flavor_id')->references('id')->on('menu_flavors');
            $table->unique([
                'menu_product_variant_id',
                'reception_date',
                'menu_flavor_id'
            ]);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_inventories');
    }
};
