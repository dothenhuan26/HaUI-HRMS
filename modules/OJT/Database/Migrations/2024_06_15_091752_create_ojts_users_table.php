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
        Schema::create('ojts_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("ojt_id");
            $table->unsignedBigInteger("user_id");
            $table->foreign("ojt_id")->references("id")->on("ojts");
            $table->foreign("user_id")->references("id")->on("users");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ojts_users');
    }
};
