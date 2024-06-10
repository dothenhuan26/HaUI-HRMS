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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->string("bank_name")->nullable();
            $table->string("bank_number")->nullable();
            $table->string("salary_basis")->default("monthly");
            $table->string("payment_type")->default("bank");
            $table->double("salary")->default(0);
            $table->double("gratuity")->default(0);
            $table->double("salary_gross")->default(0);
            $table->double("salary_net")->default(0);
            $table->double("overtime")->default(0);
            $table->double("deduction")->default(0);
            $table->unsignedInteger("unpaid_leave")->default(0);
            $table->double("advance")->default(0);
            $table->double("absent_amount")->default(0);
            $table->double("allowance")->default(0);
            $table->double("loan")->default(0);
            $table->double("insurance")->default(0);
            $table->double("others")->default(0);
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("user_create")->nullable();
            $table->unsignedBigInteger("user_update")->nullable();

            $table->foreign("user_id")->references("id")->on("users");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};
