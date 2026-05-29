<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 150);
            $table->string('phone', 20)->nullable();
            $table->string('subject', 200);
            $table->text('message');
            $table->string('ip_address', 45);
            $table->boolean('is_read')->default(false);
            $table->timestamps();

            // Indexes
            $table->index('created_at');    // Sorting dashboard
            $table->index('is_read');        // Filter unread messages
            $table->index('ip_address');     // Spam analysis
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};
