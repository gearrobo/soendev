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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug')->unique();

            $table->string('category')->nullable();

            $table->string('short_description')->nullable();

            $table->longText('description')->nullable();

            $table->string('featured_image')->nullable();

            $table->string('client')->nullable();

            $table->string('project_url')->nullable();

            $table->string('button_text')->nullable();

            $table->boolean('is_active')->default(true);

            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
