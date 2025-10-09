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
        Schema::create('aspirations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('destination_id')->constrained('destinations');
            $table->string('name', 255)->nullable();
            $table->string('phone', 20)->nullable();
            $table->text('content');
            $table->text('image')->nullable();
            $table->string('custom_category', 100)->nullable();
            $table->foreignId('aspiration_category_id')->constrained('aspiration_categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspirations');
    }
};
