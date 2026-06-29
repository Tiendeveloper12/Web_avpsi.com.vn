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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedTinyInteger('rating');
            $table->string('title', 255)->nullable();
            $table->text('body');
            $table->string('image', 500)->nullable();
            $table->string('status', 50)->default('pending'); // 'pending', 'approved', 'rejected'
            $table->text('admin_note')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('user')->onDelete('set null');

            // Indexes
            $table->index(['product_id', 'status']);
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
