<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('designations', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("description")->nullable();
            $table->text("requirements")->nullable();
            $table->text("responsibilities")->nullable();
            $table->string("salary_from")->nullable();
            $table->string("salary_to")->nullable();
            $table->string("status")->nullable();
            $table->unsignedBigInteger("user_create")->nullable();
            $table->unsignedBigInteger("user_update")->nullable();
            $table->unsignedBigInteger("department_id")->nullable();
            $table->foreign("department_id")->references("id")->on("departments")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('designations');
    }
};
