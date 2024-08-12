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
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("top_category_id");
            $table->string("name_tr", 191);
            $table->string("name_en", 191);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('sub_categories', function (Blueprint $table) {
            $table->foreign('top_category_id')->references('id')->on('top_categories');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('sub_categories', function (Blueprint $table) {
            $table->dropForeign(["top_category_id"]);
        });

        Schema::dropIfExists('sub_categories');
    }
};
