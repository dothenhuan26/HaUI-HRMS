<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("location")->nullable();
            $table->text("description")->nullable();
            $table->integer("vacancies")->nullable();
            $table->string("age")->nullable();
            $table->string("job_type")->nullable();
            $table->string("experiences")->nullable();
            $table->date("start_date")->nullable();
            $table->date("expired_date")->nullable();
            $table->string("salary_from")->nullable();
            $table->string("salary_to")->nullable();
            $table->string("status")->nullable();
            $table->unsignedBigInteger("department_id")->nullable();
            $table->unsignedBigInteger("designation_id")->nullable();
            $table->unsignedBigInteger("user_create")->nullable();
            $table->unsignedBigInteger("user_update")->nullable();
            $table->timestamps();
            $table->foreign("designation_id")->references("id")->on("designations");
            $table->foreign("department_id")->references("id")->on("departments");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
