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
        Schema::create('social_neworks', function (Blueprint $table) {
            $table->id();
            $table->string("name")->comment("The social Network name");
            $table->string("icon")->comment("The social network's icon image");
            $table->tinyInteger("is_link")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_neworks');
    }
};
