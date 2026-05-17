<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("client_id");
            $table->foreign('client_id')->references('id')->on('people');

            $table->unsignedBigInteger("employee_id");
            $table->foreign('employee_id')->references('id')->on('employees');

            $table->decimal('total_amount', 15, 2);

            $table->enum('type_payment', ['delivery', 'event', 'internal']);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
