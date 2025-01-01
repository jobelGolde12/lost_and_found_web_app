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
        Schema::table('users_info', function (Blueprint $table) {
            $table->dropColumn('facebook_link');
            $table->string('facebook_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users_info', function (Blueprint $table) {
            $table->dropColumn('facebook_link');
        });
    }
};