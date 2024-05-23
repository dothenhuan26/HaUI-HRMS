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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string("address")->nullable();
            $table->string("gender")->default("other");
            $table->date("birthday")->nullable();
            $table->boolean("is_active")->default(false);
            $table->string("status")->default("publish");
            $table->string("phone", 10)->nullable();
            $table->string("passport")->nullable();
            $table->date("passport_exp")->nullable();
            $table->string("national")->nullable();
            $table->string("religion")->nullable();
            $table->string("country")->nullable();
            $table->text("educations")->nullable();
            $table->text("experiences")->nullable();
            $table->bigInteger("user_create")->nullable();
            $table->bigInteger("user_update")->nullable();
            $table->unsignedBigInteger("role_id")->nullable();
            $table->bigInteger("designation_id")->nullable();
            $table->bigInteger("avatar_id")->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
