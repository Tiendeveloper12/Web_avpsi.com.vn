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
        Schema::table('product', function (Blueprint $table) {
            $table->decimal('competitor_price', 15, 2)->nullable()->after('sell');
            $table->string('competitor_url')->nullable()->after('competitor_price');
            $table->timestamp('market_updated_at')->nullable()->after('competitor_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product', function (Blueprint $table) {
            $table->dropColumn(['competitor_price', 'competitor_url', 'market_updated_at']);
        });
    }
};
