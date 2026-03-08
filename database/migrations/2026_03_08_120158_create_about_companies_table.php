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
        Schema::create('about_companies', function (Blueprint $table) {
            $table->id();
            $table->jsonb('section_label');
            $table->jsonb('title');
            $table->jsonb('description');
            $table->integer('experience_year');
            $table->jsonb('experience_text');
            $table->string('experience_photo');
            $table->jsonb('block_label1');
            $table->jsonb('block_title1');
            $table->string('block_photo1');
            $table->jsonb('block_label2');
            $table->jsonb('block_title2');
            $table->string('block_photo2');
            $table->jsonb('founder_name');
            $table->jsonb('founder_position');
            $table->string('founder_photo');
            $table->string('main_photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_companies');
    }
};
