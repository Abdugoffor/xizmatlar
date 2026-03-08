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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('phone_1');
            $table->string('phone_2');
            $table->string('email_1');
            $table->string('email_2');
            $table->jsonb('address');
            $table->string('tlegram');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('watsapp');
            $table->string('linked');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
