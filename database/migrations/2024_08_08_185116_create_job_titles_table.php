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
        Schema::create('job_titles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('isco_id')->nullable();
            $table->string('titleTR');
            $table->string('titleEN')->nullable();
            $table->string('descriptionTR')->nullable();
            $table->string('descriptionEN')->nullable();
            $table->string('keywordsTR')->nullable();
            $table->string('keywordsEN')->nullable();

            $table->timestamps();
        });

        Schema::table('job_titles', function (Blueprint $table){
            $table->foreign('isco_id')->references('id')->on('isco_codes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_titles', function (Blueprint $table) {
            $table->dropForeign(['isco_id']);
        });

        Schema::dropIfExists('job_titles');
    }
};
