<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create("employees", function (Blueprint $table) {
            $table->id();
            // salario
            $table->decimal("salary", 15, 2)->nullable();
            $table->unsignedBigInteger("person_id")->index();
            $table->foreign("person_id")->references("id")->on("people");
            // mudar esto a otra tabla
            // fecha de ingreso
            $table->date("start_date");
            // fecha de finalizacion
            $table->date("end_date")->nullable();
            $table->unsignedBigInteger("user_id")->index();
            $table->foreign("user_id")->references("id")->on("users");

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("employees");
    }
};
