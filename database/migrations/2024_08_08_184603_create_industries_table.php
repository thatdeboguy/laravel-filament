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
        Schema::create('industries', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("sector_id");
            $table->string("name_tr", 191);
            $table->string("name_en", 191);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('industries', function (Blueprint $table) {
            $table->foreign('sector_id')->references('id')->on('sectors');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('industries', function (Blueprint $table) {
            $table->dropForeign(["sector_id"]);
        });

        Schema::dropIfExists('industries');
    }
};
