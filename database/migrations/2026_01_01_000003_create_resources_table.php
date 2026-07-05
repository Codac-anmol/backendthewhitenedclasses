<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('class_label');       // e.g. "Class 10"
            $table->string('icon')->default('📝'); // emoji shown as the card icon
            $table->string('format')->default('PDF');
            $table->string('file_path')->nullable();       // storage/app/public path
            $table->string('file_size_label')->nullable(); // e.g. "1.2 MB"
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resources');
    }
};
