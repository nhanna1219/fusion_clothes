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
        Schema::table('user_addresses', function (Blueprint $table) {
            //
            $table->string('city', 255)->change();
            $table->string('district', 255)->change();
            $table->string('ward', 255)->change();
            $table->string('postal_code', 12)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_addresses', function (Blueprint $table) {
            //
            $table->string('city')->change();
            $table->string('district')->change();
            $table->string('ward')->change();
            $table->string('postal_code')->change();
        });
    }
};
