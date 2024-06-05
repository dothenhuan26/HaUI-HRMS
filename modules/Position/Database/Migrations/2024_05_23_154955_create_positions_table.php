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
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("slug")->unique();
            $table->string("location")->nullable();
            $table->text("description")->nullable();
            $table->integer("vacancies")->nullable();
            $table->integer("candidates")->default(0);
            $table->string("age")->nullable();
            $table->string("job_type")->nullable();
            $table->string("experiences")->nullable();
            $table->text("requirements")->nullable();
            $table->text("responsibilities")->nullable();
            $table->date("start_date")->nullable();
            $table->date("expired_date")->nullable();
            $table->string("salary_from")->nullable();
            $table->string("salary_to")->nullable();
            $table->string("status")->nullable();
            $table->text("contact")->nullable();
            $table->integer("views")->default(0);
            $table->unsignedBigInteger("department_id")->nullable();
            $table->unsignedBigInteger("designation_id")->nullable();
            $table->unsignedBigInteger("user_create")->nullable();
            $table->unsignedBigInteger("user_update")->nullable();
            $table->timestamps();
            $table->foreign("designation_id")->references("id")->on("designations")->onDelete("cascade");
            $table->foreign("department_id")->references("id")->on("departments")->onDelete("cascade");
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
