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
        Schema::create('service_sections', function (Blueprint $table) {
            $table->id();
            $table->jsonb('title');
            $table->jsonb('description');
            $table->jsonb('label_1');
            $table->jsonb('text_1');
            $table->string('photo_1');
            $table->jsonb('label_2');
            $table->jsonb('text_2');
            $table->string('photo_2');
            $table->jsonb('label_3');
            $table->jsonb('text_3');
            $table->string('photo_3');
            $table->string('main_photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_sections');
    }
};
