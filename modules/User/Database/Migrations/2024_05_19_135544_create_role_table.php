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
        if (!Schema::hasTable("core_roles")) {
            Schema::create('core_roles', function (Blueprint $table) {
                $table->id();
                $table->string("name")->nullable();
                $table->string("code", 50)->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable("core_role_permissions")) {
            Schema::create("core_role_permissions", function (Blueprint $table) {
                $table->id();
                $table->string("permission")->nullable();
                $table->unsignedBigInteger("role_id")->nullable();
                $table->unique(['role_id', 'permission']);
                $table->timestamps();
                $table->foreign("role_id")->references("id")->on("core_roles");
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('core_roles');
        Schema::dropIfExists('core_role_permissions');
    }
};
