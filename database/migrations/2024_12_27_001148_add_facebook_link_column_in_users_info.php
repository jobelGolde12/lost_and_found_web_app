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
            $table->dropColumn('social_links');
            $table->string('facebook_link');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users_info', function (Blueprint $table) {
            $table->json('social_links')->nullable();
            $table->dropColumn('facebook_link');
        });
    }
};
