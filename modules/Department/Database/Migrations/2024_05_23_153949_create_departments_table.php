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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("description")->nullable();
            $table->unsignedBigInteger("manager_id")->nullable();
            $table->string("location")->nullable();
            $table->double("budget")->default(0);
            $table->string("status")->default("publish");
            $table->string("phone", 10)->nullable();
            $table->string("email")->unique()->nullable();
            $table->unsignedBigInteger("user_create")->nullable();
            $table->unsignedBigInteger("user_update")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
