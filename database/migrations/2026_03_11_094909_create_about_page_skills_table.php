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
        Schema::create('about_page_skills', function (Blueprint $table) {
            $table->id();
            $table->jsonb('title');
            $table->jsonb('description');
            $table->jsonb('text');
            $table->string('photo_1');
            $table->string('photo_2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_page_skills');
    }
};
