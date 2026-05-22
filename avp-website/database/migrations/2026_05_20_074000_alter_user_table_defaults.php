<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Set default values for phone and random fields to prevent insert errors during customer signup
        DB::statement("ALTER TABLE `user` MODIFY COLUMN `phone` VARCHAR(255) NOT NULL DEFAULT ''");
        DB::statement("ALTER TABLE `user` MODIFY COLUMN `random` TEXT NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert columns to NOT NULL without defaults
        DB::statement("ALTER TABLE `user` MODIFY COLUMN `phone` VARCHAR(255) NOT NULL");
        DB::statement("ALTER TABLE `user` MODIFY COLUMN `random` TEXT NOT NULL");
    }
};
