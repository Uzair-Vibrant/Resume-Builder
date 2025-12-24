<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('resume_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('preview_image')->nullable();
            $table->timestamps();
        });

        // Seed default templates
        \DB::table('resume_templates')->insert([
            ['name' => 'Modern Blue'],
            ['name' => 'Professional Grey'],
            ['name' => 'Creative Red'],
            ['name' => 'Elegant Black'],
            ['name' => 'Minimal White'],
            ['name' => 'Colorful Rainbow'],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('resume_templates');
    }
};
