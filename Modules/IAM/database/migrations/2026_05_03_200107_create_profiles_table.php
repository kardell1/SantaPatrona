<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create("profiles", function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("person_id")->index();
            $table->foreign("person_id")->references("id")->on("people");

            $table->string("paternal_lastname", 100);
            $table->string("maternal_lastname", 100);
            $table
                ->enum("gender", ["female", "male", "other"])
                ->default("other");

            $table->string("identification_type")->nullable();
            $table->string("identification_number")->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("profiles");
    }
};
