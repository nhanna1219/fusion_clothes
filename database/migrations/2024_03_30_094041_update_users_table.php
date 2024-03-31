<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop the 'name' column if it exists
            if (Schema::hasColumn('users', 'name')) {
                $table->dropColumn('name');
            }

            // Add new columns if they don't exist
            if (!Schema::hasColumn('users', 'username')) {
                $table->string('username')->unique()->after('id');
            }
            if (!Schema::hasColumn('users', 'first_name')) {
                $table->string('first_name')->nullable()->after('email');
            }
            if (!Schema::hasColumn('users', 'last_name')) {
                $table->string('last_name')->nullable()->after('first_name');
            }
            if (!Schema::hasColumn('users', 'phone')) {
                $table->string('phone')->nullable()->after('last_name');
            }
            if (!Schema::hasColumn('users', 'role_id')) {
                $table->unsignedBigInteger('role_id')->nullable()->after('phone');
                $table->foreign('role_id')->references('id')->on('user_roles')->onDelete('set null');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Add the 'name' column back
            $table->string('name')->after('id');

            // Drop the columns if they exist
            $table->dropColumn(['username', 'first_name', 'last_name', 'phone', 'role_id']);

            // Drop foreign key before dropping the column
            $table->dropForeign(['role_id']);
        });
    }
};
