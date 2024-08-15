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
        Schema::dropIfExists('places');

        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->json('name');
            $table->string('slug')->nullable();
            $table->string('zip_code')->nullable();
            $table->json('geoposition')->nullable();
            $table->unsignedBigInteger('place_type_id')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->text('description')->nullable();
            $table->bigInteger('old_city_id')->nullable();
            $table->softDeletes();
            $table->timestamps(); 
        });

        Schema::table('places', function (Blueprint $table) {
            $table->foreign('place_type_id')->references('id')->on('place_types');
            $table->foreign('parent_id')
              ->references('id')->on('places')
              ->cascadeOnUpdate()->cascadeOnDelete();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('places', function (Blueprint $table) {
            $table->dropForeign(['place_type_id']);
            $table->dropForeign(['parent_id']);
        });

        Schema::dropIfExists('places');
    }
};
