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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->jsonb('title');
            $table->jsonb('description');
            $table->jsonb('text');
            $table->jsonb('footer_text');
            $table->string('photo');
            $table->string('video');
            $table->integer('order')->default(0);
            $table->date('date');
            $table->boolean('is_main')->default(true);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
