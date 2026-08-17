<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('firmware_releases', function (Blueprint $table) {
            $table->id();

            $table->string('device_type');
            $table->string('version');
            $table->string('filename');

            $table->string('disk')->default('public');
            $table->string('path');

            $table->text('release_notes')->nullable();

            $table->boolean('is_active')->default(false);

            $table->timestamps();

            $table->index([
                'device_type',
                'is_active',
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('firmware_releases');
    }
};
