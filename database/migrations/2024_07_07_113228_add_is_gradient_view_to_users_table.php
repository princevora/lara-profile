<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger("is_gradient_view")->nullable(false)->default(1);
        });

        DB::statement("ALTER TABLE users MODIFY COLUMN is_gradient_view TINYINT NOT NUll DEFAULT 1 AFTER accent_color");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger("is_gradient_view")->nullable(false)->default(1);
        });

        DB::statement("ALTER TABLE users MODIFY COLUMN is_gradient_view TINYINT NOT NULL DEFAULT 1 AFTER accent_color");
    }
};
