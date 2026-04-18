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
        Schema::table('contacts', function (Blueprint $table) {
            $table->string('phone_3')->nullable()->after('phone_2');
            $table->string('email_3')->nullable()->after('email_2');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            Schema::table('contacts', function (Blueprint $table) {
                $table->dropColumn('phone_3');
                $table->dropColumn('email_3');
            });
        });
    }
};
