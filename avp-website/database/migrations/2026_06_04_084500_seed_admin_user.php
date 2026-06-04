<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $email = 'Admin1@gmail.com';
        
        // Check if admin user already exists
        $exists = DB::table('user')->where('email', $email)->exists();
        
        if (!$exists) {
            DB::table('user')->insert([
                'name' => 'Admin',
                'email' => $email,
                'password' => Hash::make('adminadmin'),
                'phone' => '0912979394',
                'random' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('user')->where('email', 'Admin1@gmail.com')->delete();
    }
};
