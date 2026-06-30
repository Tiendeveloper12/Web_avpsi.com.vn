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
        Schema::table('user', function (Blueprint $table) {
            $table->string('status', 50)->default('active')->after('password');
        });

        // Set Admin1@gmail.com role_id to 2 (Super Admin)
        DB::table('user')->where('email', 'Admin1@gmail.com')->update([
            'role_id' => 2,
            'status' => 'active'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert Admin1@gmail.com
        DB::table('user')->where('email', 'Admin1@gmail.com')->update([
            'role_id' => 0
        ]);

        Schema::table('user', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
