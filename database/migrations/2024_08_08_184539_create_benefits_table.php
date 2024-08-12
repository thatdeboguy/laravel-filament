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
        Schema::create('benefits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_tr', 191);
            $table->string('name_en', 191)->nullable();
            $table->string('description', 191)->nullable();
            $table->unsignedInteger('benefit_group_id')->nullable();
            $table->boolean('is_modifiable')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('benefits');
    }
};
